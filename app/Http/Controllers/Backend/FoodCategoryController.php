<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\FoodCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Traits\ImageUpload;

class FoodCategoryController extends Controller
{
    use ImageUpload;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = FoodCategory::all();
        return view('backend.food_category.index', compact('categories'));
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
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'icon' => 'required',
            'is_featured' => 'required',
            'status' => 'required',
        ]);

        if ($validator->fails()) {
            notify()->error($validator->errors()->first(), 'Error');

            return redirect()->back();
        }

        $input = $request->all();
        FoodCategory::create([
            'name' => $input['name'],
            'icon' => self::imageUploadTrait($input['icon']),
            'is_featured' => $input['is_featured'],
            'status' => $input['status'],
        ]);

        notify()->success('Food Category created successfully');

        return redirect()->route('admin.food-category.index');
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
        $category = FoodCategory::find($id);

        return response()->json([
            'name' => $category->name,
            'icon' => asset($category->icon),
            'is_featured' => $category->is_featured,
            'status' => $category->status
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'status' => 'required',
        ]);

        if ($validator->fails()) {
            notify()->error($validator->errors()->first(), 'Error');

            return redirect()->back();
        }


        $foodCategory = FoodCategory::find($id);
        $input = $request->all();
        $data = [
            'name' => $input['name'],
            'icon' => self::imageUploadTrait($input['icon']),
            'is_featured' => $input['is_featured'],
            'status' => $input['status'],
        ];


        $foodCategory->update($data);

        notify()->success('Food Category created successfully');

        return redirect()->route('admin.food-category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
