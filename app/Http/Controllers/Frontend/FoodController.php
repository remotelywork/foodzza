<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Food;
use Illuminate\Http\Request;

class FoodController extends Controller
{
    public function productDetails($id)
    {
        $food_details = Food::where('id', $id)->firstOrFail();

        $releted_items = Food::where('category', $food_details->category)->take(10)->get();
//        dd($releted_items);
        return view('frontend.foodzza.pages.food_details',compact('food_details','releted_items'));
    }
}
