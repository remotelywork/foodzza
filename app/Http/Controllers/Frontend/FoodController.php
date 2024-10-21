<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Food;

class FoodController extends Controller
{
    public function productDetails($id)
    {
        $food_details = Food::where('id', $id)->firstOrFail();


        $releted_items = Food::where(function ($query) use ($food_details) {
            foreach ($food_details->category as $category) {
                $query->orWhereRaw('JSON_CONTAINS(category, \'["' . $category . '"]\')');
            }
        })->take(10)->get();

//        dd($releted_items);
    
        return view('frontend.foodzza.pages.food_details',compact('food_details','releted_items'));
    }
}