<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\AppliedCoupon;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function checkout()
    {
        $carts = Cart::where('user_id', Auth::id())->get();
        $total_price = 0;
        foreach ($carts as $cart){
            $total_price += $cart->total_price;
        }
        $coupon = AppliedCoupon::where('user_id', Auth::id())
            ->where('status',false)->first();

        $coupon_code = null;
        $coupon_amount = 0;
        if ($coupon){
            $coupon_code = $coupon->coupon->code;
            $coupon_amount = $coupon->amount;
            $total_price -= $coupon_amount;
        }

        return view('frontend.foodzza.user.checkout',compact('carts','total_price','coupon','coupon_code','coupon_amount'));
    }
}
