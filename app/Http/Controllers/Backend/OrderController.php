<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Food;
use App\Models\FoodCategory;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->query('query') ?? null;
        $foodCat = $request->query('filter_by_category') ?? null;
        $title = "Order List";

        $foodCategories = FoodCategory::all();

        $userName = Auth::user()->name;

        if($userName != 'Super Admin'){
            $orders = Order::query()
                ->when($search, function ($query, $search) {
                    $query->search($search);
                })
                ->when($foodCat, function ($query, $foodCat) {
                    $query->whereJsonContains('category', $foodCat);
                })
                ->where('delivery_man', Auth::id())
                ->latest()
                ->paginate(10);

            return view('backend.order.index',compact('orders','foodCategories','title'));
        }

        $orders = Order::query()
            ->when($search, function ($query, $search) {
                $query->search($search);
            })
            ->when($foodCat, function ($query, $foodCat) {
                $query->whereJsonContains('category', $foodCat);
            })
            ->latest()
            ->paginate(10);

        return view('backend.order.index',compact('orders','foodCategories','title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $order = Order::find($id);

        $delivery_mans = Admin::with('roles')->whereHas('roles',function ($rolesQuery){
            return $rolesQuery->where('name','Delivery-Man');
        })->get() ;

        return view('backend.order.edit',compact('order','delivery_mans'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $order = Order::find($id);

        // Check if the order exists
        if (!$order) {
            notify()->error('Order not found');
            return redirect()->back();
        }

        // If the delivery status is 'cancel', restock the food items
        if ($request->delivery_status == 'cancel') {
            $this->restockItems($order->product_details);
        }

        // Common updates for both Super Admin and other users
        $order->message = $request->message;
        $order->delivery_status = $request->delivery_status;
        $userName = Auth::user()->name;

        // If user is not 'Super Admin', assign the delivery man as the authenticated user
        if ($userName != 'Super Admin') {
            $order->delivery_man = Auth::id();
        } else {
            // For Super Admin, use the provided delivery man
            $order->delivery_man = $request->filled('delivery_man') ? $request->delivery_man : null;
        }

        $order->save();

        notify()->success('Order updated successfully');
        return redirect()->route('admin.order.index');
    }

    private function restockItems($items)
    {
        $items = json_decode($items);

        foreach ($items as $item) {
            $food = Food::find($item->product_id);
            if ($food) {
                $food->quantity += $item->quantity;
                $food->save();
            }
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Order::where('id',$id)->delete();

        notify()->success('order deleted successfully');
        return redirect()->back();
    }
}
