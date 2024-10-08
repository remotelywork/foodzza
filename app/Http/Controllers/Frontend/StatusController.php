<?php

namespace App\Http\Controllers\Frontend;

use Txn;
use App\Traits\Payment;
use App\Traits\NotifyTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Session;

class StatusController extends Controller
{
    use NotifyTrait, Payment;

    public function pending(Request $request)
    {
        $depositTnx = Session::get('deposit_tnx');

        return self::paymentNotify($depositTnx, 'pending');
    }

    public function success(Request $request)
    {
        if (isset($request->reftrn)) {
            $ref = Crypt::decryptString($request->reftrn);

            return self::paymentSuccess($ref);
        }
        
        $depositTnx = Session::get('deposit_tnx');

        return self::paymentNotify($depositTnx, 'success');

    }

    public function cancel(Request $request)
    {
        $trx = Session::get('deposit_tnx');
        Txn::update($trx, 'failed');

        notify()->warning('Payment Canceled');

        return redirect(route('user.dashboard'))->setStatusCode(200);
    }
}
