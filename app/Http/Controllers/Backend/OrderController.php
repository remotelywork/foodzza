<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\FoodCategory;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->query('query') ?? null;
        $foodCat = $request->query('filter_by_category') ?? null;

        $foodCategories = FoodCategory::all();

        $orders = Order::query()
            ->when($search, function ($query, $search) {
                $query->search($search);
            })
            ->when($foodCat, function ($query, $foodCat) {
                $query->where('category', $foodCat);
            })
            ->latest()
            ->paginate(10);

        $title = "Order List";

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
//        dd($id);
//        return view('backend.order.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Order::where('id',$id)->delete();

        notify()->success('rder deleted successfully');
        return redirect()->back();
    }
}
