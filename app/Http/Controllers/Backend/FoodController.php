<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Food;
use App\Models\FoodCategory;
use App\Traits\ImageUpload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FoodController extends Controller
{
    use ImageUpload;
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->query('query') ?? null;
        $foodCat = $request->query('filter_by_category') ?? null;

        $foodCategories = FoodCategory::all();

        $foodItems = Food::query()
            ->when($search, function ($query, $search) {
                $query->search($search);
            })
            ->when($foodCat, function ($query, $foodCat) {
                $query->whereJsonContains('category', $foodCat);
            })
            ->latest()
            ->paginate(10);

        $title = "Food Items List";


        return view('backend.food.index', compact('foodItems', 'foodCategories', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $foodCategories = FoodCategory::all();
        return view('backend.food.create', compact('foodCategories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'thumb_image' => 'required|image|mimes:jpg,png,svg',
            'name' => 'required',
            'price' => 'required',
            'category' => 'required',
            'quantity' => 'required',
            'status' => 'required',
        ]);
        if ($validator->fails()) {
            notify()->error($validator->errors()->first(), 'Error');
            return redirect()->back();
        }

        $input = $request->all();

        $galleryImages = [];
        if ($request->hasFile('galleries')) {
            foreach ($request->file('galleries') as $image) {
                $galleryImages[] = self::imageUploadTrait($image);
            }
        }

        $images = !empty($galleryImages) ? $galleryImages : null;
        $complimentaryItems = !empty($input['fields']) ? ($input['fields']) : null;

        $data = [
            'thumb_image' => self::imageUploadTrait($input['thumb_image']),
            'name' => $input['name'],
            'price' => $input['price'],
            'discount_price' => !empty($input['discount_price']) && $input['discount_price'] != 0 ? $input['discount_price'] : null,
            'discount_validity' => !empty($input['discount_validity']) ? $input['discount_validity'] : null,
            'category' => $input['category'],
            'shipping_cost' => !empty($input['shipping_cost']) ? $input['shipping_cost'] : null,
            'quantity' => $input['quantity'],
            'status' => $input['status'],
            'overview' => $input['overview'],
            'images' => $images,
            'complimentary_items' => $complimentaryItems,
        ];

        Food::create($data);

        notify()->success('Item created successfully');

        return redirect()->route('admin.food-item.index');
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
        $food_detail = Food::where('id', $id)->first();
        $foodCategories = FoodCategory::all();

        return view('backend.food.edit', compact('food_detail', 'foodCategories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'thumb_image' => 'nullable|image|mimes:jpg,png,svg',
            'name' => 'required',
            'price' => 'required',
            'category' => 'required',
            'quantity' => 'required',
            'status' => 'required',
        ]);

        if ($validator->fails()) {
            notify()->error($validator->errors()->first(), 'Error');
            return redirect()->back();
        }

        $foodItem = Food::findOrFail($id);
        $input = $request->all();

        $galleryImages = is_array($foodItem->images) ? $foodItem->images : [];

        if ($request->hasFile('galleries')) {
            foreach ($request->file('galleries') as $image) {
                $galleryImages[] = self::imageUploadTrait($image);
            }
        }

        if (!empty($input['deleted_images'])) {
            $deletedImages = explode(',', rtrim($input['deleted_images'], ','));
            foreach ($deletedImages as $deletedImage) {
                if (($key = array_search($deletedImage, $galleryImages)) !== false) {
                    unset($galleryImages[$key]); // Remove the deleted image from the array
                }
            }
        }

        // Reindex the array after removing the images
        $galleryImages = array_values($galleryImages);

        // Handle complimentary items
        $complimentaryItems = [];

        // Get existing items that have been updated
        if (!empty($input['existing_fields'])) {
            foreach ($input['existing_fields'] as $key => $existingItem) {
                $complimentaryItems[] = [
                    'name' => $existingItem['name'],
                    'price' => $existingItem['price'],
                ];
            }
        }

        // Add new items
        if (!empty($input['fields'])) {
            foreach ($input['fields'] as $newItem) {
                $complimentaryItems[] = [
                    'name' => $newItem['name'],
                    'price' => $newItem['price'],
                ];
            }
        }

        // Remove deleted complimentary items
        if (!empty($input['deleted_items'])) {
            $deletedItems = explode(',', rtrim($input['deleted_items'], ','));
            foreach ($deletedItems as $deletedKey) {
                if (isset($complimentaryItems[$deletedKey])) {
                    unset($complimentaryItems[$deletedKey]);
                }
            }

            // Reindex the array after removing the items
            $complimentaryItems = array_values($complimentaryItems);
        }

        $data = [
            'thumb_image' => $request->hasFile('thumb_image') ? self::imageUploadTrait($input['thumb_image']) : $foodItem->thumb_image,
            'name' => $input['name'],
            'price' => $input['price'],
            'discount_price' => !empty($input['discount_price']) && $input['discount_price'] != 0 ? $input['discount_price'] : null,
            'discount_validity' => !empty($input['discount_validity']) ? $input['discount_validity'] : null,
            'category' => $input['category'],
            'shipping_cost' => !empty($input['shipping_cost']) ? $input['shipping_cost'] : null,
            'quantity' => $input['quantity'],
            'status' => $input['status'],
            'overview' => $input['overview'],
            'images' => !empty($galleryImages) ? $galleryImages : null, // Save images if present
            'complimentary_items' => $complimentaryItems,
        ];

        $foodItem->update($data);

        notify()->success('Item updated successfully');
        return redirect()->route('admin.food-item.index');
    }




    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $foodItem = Food::find($id);

        $foodItem->delete();

        notify()->success('Item Deleted successfully');

        return redirect()->back();
    }
}
