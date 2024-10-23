<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\AppliedCoupon;
use App\Models\Cart;
use App\Models\Food;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'email' => 'required|email|max:255',
            'total_price' => 'required|numeric',
            'payment' => 'required|string',
        ]);

        if (!$validatedData){
            return redirect()->back()->with('failed','Give proper data');
        }
        $order_number = strtoupper(bin2hex(random_bytes(4)));

        $cart_items = Cart::where('user_id', Auth::id())->get();

        $product_details = $cart_items->mapWithKeys(function ($item, $index) {
            return [
                "product_" . ($index + 1) => [
                    'product_id' => $item->product_id,
                    'name' => $item->item->name,
                    'quantity' => $item->quantity,
                    'complimentary_items' => $item->complimentary_item,
                    'total_price' => $item->total_price,
                ]
            ];
        })->toArray();
        $total_quantity = $cart_items->sum('quantity');

        $promo_code = $request->code ?? null;
        $promo_discount = $request->coupon_amount ?? 0;

        $billing_details = $request->only(['name', 'address', 'phone', 'email', 'additional_msg']);

        Order::create([
            'order_number' => $order_number,
            'user_id' => Auth::id(),
            'product_details' => json_encode($product_details),
            'quantity' => $total_quantity,
            'promo_code' => $promo_code,
            'promo_discount' => $promo_discount,
            'billing_details' => json_encode($billing_details),
            'delivery_status' => 'pending',
            'total_amount' => $request->total_price,
            'payment_method' => $request->payment,
            'txn_id' => null,
        ]);

        $productDetails = $product_details;
        foreach ($productDetails as $product) {
            $productId = $product['product_id'];
            $quantityToSubtract = $product['quantity'];

            $productModel = Food::find($productId);

            if ($productModel) {
                $productModel->quantity -= $quantityToSubtract;
                $productModel->save();
            }
        }

        $promo_code = AppliedCoupon::where('user_id',Auth::id())->where('status', 0)->first();
        if ($promo_code) {
            $promo_code->status = 1;
            $promo_code->save();
        }

        Cart::where('user_id', Auth::id())->delete();

        notify()->success('Your order has been placed successfully');
        return redirect()->route('user.dashboard')->with('success', 'Order placed successfully!');
    }
}
