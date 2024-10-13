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
        // Retrieve the food item from the database
        $food = Food::where('id', $id)->first();

        // Validate the request
        $this->validate($request, [
            'quantity' => 'required|integer|min:1|max:' . $food->quantity,
            'complimentary_item' => 'array',
            'complimentary_item.*' => 'string'
        ]);

        // Get the quantity and complimentary items from the request
        $quantity = $request->input('quantity');
        $complimentaryItems = $request->input('complimentary_item', []);

        // Prepare complimentary items and calculate total price
        $complimentaryItemsData = [];
        $totalPrice = $food->discount_price ? $food->discount_price : $food->price;
        $totalPrice *= $quantity;

        // Loop through complimentary items and add their prices to total
        foreach ($complimentaryItems as $item) {
            $decodedItem = json_decode($item, true);
            $complimentaryItemsData[] = $decodedItem;
            $totalPrice += $decodedItem['price'];
        }

        // Check if shipping cost is not null and add to total price
        if ($food->shipping_cost !== null) {
            $totalPrice += $food->shipping_cost;
        }

        // Create the cart entry
        Cart::create([
            'user_id' => Auth::user()->id,
            'product_id' => $food->id,
            'quantity' => $quantity,
            'total_price' => $totalPrice,
            'complimentary_item' => json_encode($complimentaryItemsData)
        ]);

        // Notify success and redirect back
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

    public function updateCart(Request $request)
    {
        $foodId = $request->food_id;
        $quantity = $request->quantity;
        $totalPrice = $request->total_price;


        $cart = Cart::where('food_id', $foodId)->first();

        if ($cart) {
            $cart->quantity = $quantity;
            $cart->total_price = $totalPrice;
            $cart->save();

            return response()->json([
                'status' => 'success',
                'message' => 'Cart updated successfully',
            ]);
        }

        return response()->json([
            'status' => 'error',
            'message' => 'Item not found in the cart',
        ], 404);
    }

}
