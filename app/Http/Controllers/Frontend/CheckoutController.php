<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function checkout()
    {
        $carts = Cart::where('user_id', Auth::user()->id)->get();

        return view('frontend.foodzza.user.checkout',compact('carts'));
    }
}
