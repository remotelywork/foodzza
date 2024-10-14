<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Food;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function AddToCart($id) {
        $food = Food::where('id', $id)->first();

        $cart = new Cart();
        $cart->user_id = Auth::user()->id;
        $cart->product_id = $food->id;
        $cart->quantity = 1;
        $cart->total_price = $food->discount_price ? : $food->price;
        $cart->complimentary_item = $food->complimentary_item;
        $cart->promo_code = null;
        $cart->promo_discount = null;
        $cart->shipping_cost = $food->shipping_cost ?? null;
        $cart->save();

        notify()->success('Item added to the cart');

        return redirect()->back();
    }


    public function addToCartWithDetails(Request $request, $id)
    {

        $food = Food::where('id', $id)->first();


        $this->validate($request, [
            'quantity' => 'required|integer|min:1|max:' . $food->quantity,
            'complimentary_item' => 'array',
            'complimentary_item.*' => 'string'
        ]);


        $quantity = $request->input('quantity');
        $complimentaryItems = $request->input('complimentary_item', []);


        $complimentaryItemsData = [];
        $totalPrice = $food->discount_price ? $food->discount_price : $food->price;
        $totalPrice *= $quantity;


        foreach ($complimentaryItems as $item) {
            $decodedItem = json_decode($item, true);
            $complimentaryItemsData[] = $decodedItem;
            $totalPrice += $decodedItem['price'];
        }


        if ($food->shipping_cost !== null) {
            $totalPrice += $food->shipping_cost;
        }


        Cart::create([
            'user_id' => Auth::user()->id,
            'product_id' => $food->id,
            'quantity' => $quantity,
            'total_price' => $totalPrice,
            'complimentary_item' => json_encode($complimentaryItemsData)
        ]);


        notify()->success('Item added to the cart');
        return redirect()->back()->with('success', 'Item added to cart successfully!');
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

    public function update(Request $request)
    {

        $cart = Cart::where('food_id', $request->food_id)->first();

        if ($cart) {

            $cart->quantity = $request->quantity;
            $cart->total_price = $request->total_price;
            $cart->save();

            return response()->json([
                'status' => 'success',
                'message' => 'Cart updated successfully',
                'cart' => $cart
            ]);
        }

        return response()->json([
            'status' => 'error',
            'message' => 'Cart item not found'
        ], 404);
    }


}
