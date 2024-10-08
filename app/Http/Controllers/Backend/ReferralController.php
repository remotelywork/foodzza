<?php

namespace App\Http\Controllers\Backend;

use App\Models\Setting;
use App\Enums\ReferralType;
use Illuminate\Http\Request;
use App\Models\LevelReferral;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Cache;
use Illuminate\Validation\Rules\Enum;
use Illuminate\Contracts\View\Factory;
use Illuminate\Support\Facades\Validator;
use Illuminate\Contracts\Foundation\Application;

class ReferralController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:manage-referral', ['only' => ['index']]);
        $this->middleware('permission:referral-create', ['only' => ['store']]);
        $this->middleware('permission:referral-edit', ['only' => ['update']]);
        $this->middleware('permission:referral-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {

        $referralType = [
            ReferralType::Deposit,
            ReferralType::SubscriptionPlan,
        ];

        $deposits = LevelReferral::where('type', ReferralType::Deposit->value)->get();
        $plans = LevelReferral::where('type', ReferralType::SubscriptionPlan->value)->get();

        return view('backend.referral.index', compact('referralType', 'plans', 'deposits'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'level_type' => new Enum(ReferralType::class),
            'bounty' => 'required',
        ]);

        if ($validator->fails()) {
            notify()->error($validator->errors()->first(), 'Error');

            return redirect()->back();
        }

        $data = [
            'type' => $request->level_type,
            'bounty' => $request->bounty,
        ];

        $position = LevelReferral::where('type', $request->level_type)->max('the_order');
        $data = array_merge($data, ['the_order' => $position + 1]);

        LevelReferral::create($data);

        notify()->success('Referral level created successfully!', 'Success');

        return redirect()->route('admin.referral.index');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Models\LevelReferral  $levelReferral
     * @return RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'bounty' => 'required',
        ]);

        if ($validator->fails()) {
            notify()->error($validator->errors()->first(), 'Error');

            return redirect()->back();
        }

        $input = $request->all();

        $data = [
            'bounty' => $input['bounty'],
        ];

        LevelReferral::find($id)->update($data);
        notify()->success('Referral level updated successfully');

        return redirect()->route('admin.referral.index');
    }

    public function statusUpdate(Request $request)
    {

        $key = $request->type;
        $value = setting($key) ? 0 : 1;

        Setting::add($key, $value, 'boolean');

        Cache::forget('settings.all');

        notify()->success(ucwords(str_replace('_', ' ', $key)).'  Status updated successfully!');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LevelReferral  $levelReferral
     * @return RedirectResponse
     */
    public function destroy(Request $request, $id)
    {
        $levelReferral = LevelReferral::find($id);
        $levelReferral->delete();

        $reorders = LevelReferral::where('type', $request->type)->get();
        $i = 1;
        foreach ($reorders as $reorder) {
            $reorder->the_order = $i;
            $reorder->save();
            $i++;
        }

        notify()->success('Referral level deleted successfully!');

        return redirect()->route('admin.referral.index');

    }

    public function settings()
    {
        return view('backend.referral.settings');
    }
}
