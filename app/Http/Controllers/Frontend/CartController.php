<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Food;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function AddToCart($id) {
        $food = Food::where('id', $id)->first();

        $cart = new Cart();
        $cart->user_id = Auth::user()->id;
        $cart->product_id = $food->id;
        $cart->quantity = 1;
        $cart->total_price = $food->price;
        $cart->complimentary_item = $food->complimentary_item;
        $cart->promo_code = null;
        $cart->promo_discount = null;
        $cart->shipping_cost = $food->shipping_cost ?? null;
        $cart->save();

        notify()->success('Item added to the cart');

        return redirect()->back();
    }

    public function Carts()
    {
        $user_id = Auth::user()->id;
        $carts = Cart::where('user_id', $user_id)->get();

        return view('frontend.foodzza.pages.cart',compact('carts'));
    }

    public function Delete($id)
    {
        $cart = Cart::where('id',$id)->first();
        $cart->delete();
        return redirect()->back()->with('message','cart item removed');
    }
}
