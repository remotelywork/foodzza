<?php

namespace App\Http\Controllers\Backend;

use App\Models\Ads;
use App\Enums\AdsType;
use App\Enums\TxnType;
use App\Enums\AdsStatus;
use App\Enums\TxnStatus;
use App\Facades\Txn\Txn;
use App\Models\AdsReport;
use App\Traits\ImageUpload;
use App\Services\AdsService;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\SubscriptionPlan;
use App\Http\Controllers\Controller;
use App\Traits\NotifyTrait;
use Illuminate\Support\Facades\Validator;

class AdsController extends Controller
{
    use ImageUpload,NotifyTrait;

    public function index()
    {
        $ads = Ads::latest()->paginate();
        $title = __('All Ads');
        return view('backend.ads.index',compact('ads','title'));
    }

    public function pending()
    {
        $ads = Ads::latest()->status(AdsStatus::Pending)->paginate();
        $title = __('All Ads');
        return view('backend.ads.index',compact('ads','title'));
    }

    public function inactive()
    {
        $ads = Ads::latest()->status(AdsStatus::Inactive)->paginate();
        $title = __('Inactive Ads');
        return view('backend.ads.index',compact('ads','title'));
    }

    public function active()
    {
        $ads = Ads::latest()->status(AdsStatus::Active)->paginate();
        $title = __('Active Ads');
        return view('backend.ads.index',compact('ads','title'));
    }

    public function rejected()
    {
        $ads = Ads::latest()->status(AdsStatus::Rejected)->paginate();
        $title = __('Rejected Ads');
        return view('backend.ads.index',compact('ads','title'));
    }

    public function create()
    {
        $plans = SubscriptionPlan::get(['id','name']);
        return view('backend.ads.create',compact('plans'));
    }

    public function store(Request $request)
    {
        $planWise = setting('ads_system','permission') == 1 ? true : false;
        $validator = Validator::make($request->all(),[
            'title' => 'required',
            'amount' => 'required|numeric',
            'duration' => 'required|numeric',
            'max_views' => 'required|numeric',
            'type' => 'required|in:link,image,script,youtube',
            'status' => 'required',
            'plan_id' => [Rule::requiredIf($planWise),'exists:subscription_plans,id'],
            'schedules' => 'nullable|array'
        ]);

        if ($validator->fails()) {
            notify()->error($validator->errors()->first(), 'Error');

            return redirect()->back()->withInput();
        }

        $bannerPath = null;
        if($request->get('type') == 'image' && $request->hasFile('image')){
            $bannerPath = self::imageUploadTrait($request->file('image'));
        }

        Ads::create([
            'title' => $request->get('title'),
            'user_id' => 0,
            'plan_id' => $planWise ? $request->get('plan_id') : null,
            'amount' => $request->get('amount'),
            'duration' => $request->get('duration'),
            'max_views' => $request->get('max_views'),
            'type' => $request->get('type'),
            'value' => $request->get('type') == 'image' ? $bannerPath : $request->get($request->get('type')),
            'schedules' => $request->get('schedules'),
            'status' => $request->get('status'),
        ]);

        notify()->success(__('Ads added successfully!'));
        return to_route('admin.ads.index');
    }

    public function edit($id)
    {
        $ads = Ads::findOrFail($id);
        $plans = SubscriptionPlan::get(['id','name']);
        return view('backend.ads.edit',compact('ads','plans'));
    }

    public function update(Request $request,$id)
    {
        $planWise = setting('ads_system','permission') == 1 ? true : false;
        $validator = Validator::make($request->all(),[
            'title' => 'required',
            'amount' => 'required|numeric',
            'duration' => 'required|numeric',
            'max_views' => 'required|numeric',
            'type' => 'required|in:link,image,script,youtube',
            'status' => 'required',
            'plan_id' => [Rule::requiredIf($planWise),'exists:subscription_plans,id'],
            'schedules' => 'nullable|array'
        ]);

        if ($validator->fails()) {
            notify()->error($validator->errors()->first());

            return redirect()->back()->withInput();
        }

        $ads = Ads::findOrFail($id);

        $bannerPath = $ads->value;
        if($request->get('type') == 'image' && $request->hasFile('image')){
            $bannerPath = self::imageUploadTrait($request->file('image'));
        }

        $ads->update([
            'title' => $request->get('title'),
            'plan_id' => $planWise ? $request->get('plan_id') : null,
            'amount' => $request->get('amount'),
            'duration' => $request->get('duration'),
            'max_views' => $request->get('max_views'),
            'type' => $request->get('type'),
            'value' => $request->get('type') == 'image' ? $bannerPath : $request->get($request->get('type')),
            'schedules' => $request->get('schedules'),
            'status' => $request->get('status'),
        ]);

        if($ads->user_id != 0 && $ads->status == AdsStatus::Rejected){

            $amountForAds = match ($request->type) {
                'link' => setting('link_ads_price','fee'),
                'script' => setting('script_ads_price','fee'),
                'image' => setting('image_ads_price','fee'),
                'youtube' => setting('youtube_ads_price','fee'),
            };

            $finalAmount = $ads->max_views * $amountForAds;
            $ads->user?->increment('balance',$finalAmount);

            (new Txn)->new(
                $finalAmount,
                0,
                $finalAmount,
                'System',
                'Refund for Ads Rejected',
                TxnType::Refund,
                TxnStatus::Success,
                null,
                null,
                $ads->user_id,
            );
        }

        if($ads->wasChanged('status') && $ads->user_id !== 0 ){
            $shortcodes = [
                '[[ads_title]]' => $ads->title,
                '[[status]]' => $ads->status->value,
                '[[site_title]]' => setting('site_title', 'global'),
                '[[site_url]]' => route('home'),
            ];
    
            $this->pushNotify('ads_post', $shortcodes, route('user.my.ads.index'), $ads->user_id);
            $this->mailNotify($ads?->user?->email, 'ads_post', $shortcodes);
        }

        notify()->success(__('Ads updated successfully!'));
        return to_route('admin.ads.index');
    }

    public function destroy($id)
    {
        $ads = Ads::findOrFail($id);

        if($ads->type == AdsType::Image){
            self::delete($ads->value);
        }
        $ads->delete();

        notify()->success(__('Ads deleted successfully!'));
        return to_route('admin.ads.index');
    }

    public function reportList() 
    {
        $reports = AdsReport::with('ads','user')->latest()->paginate();
        return view('backend.ads.reports',compact('reports'));
    }
}
