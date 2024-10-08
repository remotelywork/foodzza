<?php

namespace App\Traits;

use App\Enums\TxnStatus;
use App\Enums\TxnType;
use App\Facades\Txn\Txn;
use App\Models\Transaction;
use Payment\Paytm\PaytmTxn;
use App\Models\DepositMethod;
use App\Models\LevelReferral;
use App\Models\SubscriptionPlan;
use Payment\Mollie\MollieTxn;
use Payment\Paypal\PaypalTxn;
use Payment\Stripe\StripeTxn;
use Payment\Binance\BinanceTxn;
use Payment\BlockIo\BlockIoTxn;
use Payment\Monnify\MonnifyTxn;
use Payment\Cashmaal\CashmaalTxn;
use Payment\Coinbase\CoinbaseTxn;
use Payment\Coingate\CoingateTxn;
use Payment\Paymongo\PaymongoTxn;
use Payment\Razorpay\RazorpayTxn;
use Illuminate\Support\Facades\URL;
use Payment\Cryptomus\CryptomusTxn;
use Payment\Instamojo\InstamojoTxn;
use Payment\Blockchain\BlockchainTxn;
use Illuminate\Support\Facades\Session;
use Payment\Flutterwave\FlutterwaveTxn;
use Payment\Nowpayments\NowpaymentsTxn;
use Payment\Securionpay\SecurionpayTxn;
use Payment\Twocheckout\TwocheckoutTxn;
use Payment\Btcpayserver\BtcpayserverTxn;
use Payment\Coinpayments\CoinpaymentsTxn;
use Payment\Coinremitter\CoinremitterTxn;
use Payment\Perfectmoney\PerfectmoneyTxn;

trait Payment
{
    use PlanTrait;

    //automatic deposit gateway snippet
    protected function depositAutoGateway($gateway, $txnInfo)
    {
        $txn = $txnInfo->tnx;
        Session::put('deposit_tnx', $txn);
        $gateway = DepositMethod::code($gateway)->first()->gateway->gateway_code ?? 'none';

        $gatewayTxn = self::gatewayMap($gateway, $txnInfo);
        if ($gatewayTxn) {
            return $gatewayTxn->deposit();
        }

        return self::paymentNotify($txn, 'pending');
    }

    //automatic withdraw gateway snippet
    protected function withdrawAutoGateway($gatewayCode, $txnInfo)
    {

        $gatewayTxn = self::gatewayMap($gatewayCode, $txnInfo);
        if ($gatewayTxn && config('app.demo') == 0) {
            $gatewayTxn->withdraw();
        }

        return redirect()->route('user.withdraw.log');
    }

    //automatic payment notify snippet
    protected function paymentNotify($tnx, $status)
    {
        $tnxInfo = Transaction::tnx($tnx);

        $status = ucfirst($status);

        $symbol = setting('currency_symbol', 'global');

        if($status == 'Success' && $tnxInfo->type == TxnType::PlanPurchased){
            $plan =  SubscriptionPlan::find($tnxInfo->plan_id);
            $this->executePlanPurchaseProcess($tnxInfo->user,$plan);
        }

        if ($status == 'Pending') {
            $shortcodes = [
                '[[full_name]]' => $tnxInfo->user->full_name,
                '[[txn]]' => $tnxInfo->tnx,
                '[[gateway_name]]' => $tnxInfo->method,
                '[[deposit_amount]]' => $tnxInfo->amount,
                '[[site_title]]' => setting('site_title', 'global'),
                '[[site_url]]' => route('home'),
                '[[message]]' => '',
                '[[status]]' => $status,
            ];
            $this->mailNotify(setting('site_email', 'global'), 'manual_deposit_request', $shortcodes);
            $this->pushNotify('manual_deposit_request', $shortcodes, route('admin.deposit.manual.pending'), $tnxInfo->user->id, 'Admin');
            $this->smsNotify('manual_deposit_request', $shortcodes, $tnxInfo->user->phone);
        }

       return to_route('user.transactions');
    }

    //automatic payment success snippet
    protected function paymentSuccess($ref, $isRedirect = true)
    {
        $txnInfo = Transaction::tnx($ref);

        if ($txnInfo->status == TxnStatus::Success) {
            return false;
        }

        (new Txn)->update($ref, TxnStatus::Success, $txnInfo->user_id);

        if (setting('deposit_level')) {
            $level = LevelReferral::where('type', 'deposit')->max('the_order') + 1;
            creditReferralBonus($txnInfo->user, 'deposit', $txnInfo->amount, $level);
        }

        if ($isRedirect) {
            return redirect(URL::temporarySignedRoute(
                'status.success', now()->addMinutes(2)
            ));
        }
    }

    //automatic gateway map snippet
    private function gatewayMap($gateway, $txnInfo)
    {
        $gatewayMap = [
            'paypal' => PaypalTxn::class,
            'stripe' => StripeTxn::class,
            'mollie' => MollieTxn::class,
            'perfectmoney' => PerfectmoneyTxn::class,
            'coinbase' => CoinbaseTxn::class,
            'paystack' => PaytmTxn::class,
            'voguepay' => BinanceTxn::class,
            'flutterwave' => FlutterwaveTxn::class,
            'cryptomus' => CryptomusTxn::class,
            'nowpayments' => NowpaymentsTxn::class,
            'securionpay' => SecurionpayTxn::class,
            'coingate' => CoingateTxn::class,
            'monnify' => MonnifyTxn::class,
            'coinpayments' => CoinpaymentsTxn::class,
            'paymongo' => PaymongoTxn::class,
            'coinremitter' => CoinremitterTxn::class,
            'btcpayserver' => BtcpayserverTxn::class,
            'binance' => BinanceTxn::class,
            'cashmaal' => CashmaalTxn::class,
            'blockio' => BlockIoTxn::class,
            'blockchain' => BlockchainTxn::class,
            'instamojo' => InstamojoTxn::class,
            'paytm' => PaytmTxn::class,
            'razorpay' => RazorpayTxn::class,
            'twocheckout' => TwocheckoutTxn::class,
        ];

        if (array_key_exists($gateway, $gatewayMap)) {
            return app($gatewayMap[$gateway], ['txnInfo' => $txnInfo]);
        }

        return false;

    }
}
