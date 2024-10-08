<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Ads;
use App\Enums\TxnType;
use App\Enums\AdsStatus;
use App\Enums\TxnStatus;
use App\Facades\Txn\Txn;
use App\Models\AdsHistory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AdsReport;
use App\Models\AdsReportCategory;

class AdsController extends Controller
{
    public function index()
    {
        $ads = Ads::active()->paginate();
        return view('frontend::user.ads.index',compact('ads'));
    }

    public function clicks()
    {
        $histories = AdsHistory::with('ads')->user()->paginate();
        return view('frontend::user.ads.clicks',compact('histories'));
    }

    public function adsView($id)
    {
        $ads = Ads::findOrFail(decrypt($id));
        $firstInt = rand(1,20);
        $secondInt = rand(1,20);
        $categories = AdsReportCategory::where('status',1)->get();

        $recentlyViewed = AdsHistory::user()->where('ads_id',$ads->id)->where('created_at','>=',now()->subHours(24))->exists();

        if($recentlyViewed){
            notify()->error(__('Please wait 24 Hours before viewing ads'));

            return to_route('user.ads.index');
        }

        return view('frontend::user.ads.view',compact('ads','firstInt','categories','secondInt'));
    }

    public function adsSubmit(Request $request,$id)
    {
        $adsId = decrypt($request->id);

        $recentlyViewed = AdsHistory::user()->where('ads_id',$adsId)->where('created_at','>=',now()->subHours(24))->exists();

        if($recentlyViewed){
            notify()->error(__('Please wait 24 Hours before viewing ads'));

            return to_route('user.ads.index');
        }

        $firstInt = $request->integer('first_number');
        $secondInt = $request->integer('seconds_number');

        $finalResult = $firstInt + $secondInt;

        if($finalResult !== $request->integer('result')){
            notify()->error(__('Invalid calculation'));

            return back();
        }

        $ads = Ads::where('status',AdsStatus::Active)->findOrFail($adsId);

        // Store ads history
        AdsHistory::create([
            'user_id' => auth()->id(),
            'ads_id' => $adsId,
            'amount' => $ads->amount
        ]);

        // Increment views
        $ads->increment('total_views');
        $ads->increment('remaining_views',$ads->max_views - 1);

        // Credit to User
        $user = $request->user();
        $user->increment('balance',$ads->amount);

        // Add Transaction 
        (new Txn)->new($ads->amount, 0,$ads->amount,'System', 'Ads Viewed - '.$ads->title, TxnType::AdsViewed, TxnStatus::Success);

        notify()->success(__('Ads viewed successfully'));

        return to_route('user.ads.index');
    }

    public function reportSubmit(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'description' => 'required'
        ]);

        AdsReport::create([
            'user_id' => auth()->id(),
            'ads_id' => decrypt($request->id),
            'category_id' => $request->category_id,
            'description' => $request->description
        ]);

        notify()->success(__('Ads reported successfully'));
        return to_route('user.ads.index');
    }
}
