<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Models\AdsReportCategory;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class AdsReportCategoryController extends Controller
{
    public function index() 
    {
        $categories = AdsReportCategory::latest()->paginate();
        return view('backend.ads.report.category.index',compact('categories'));
    }

    public function create()
    {
        return view('backend.ads.report.category.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'status' => 'required|boolean',
        ]);

        if ($validator->fails()) {
            notify()->error($validator->errors()->first());

            return redirect()->back()->withInput();
        }

        AdsReportCategory::create([
            'name' => $request->get('name'),
            'status' => $request->boolean('status'),
        ]);

        notify()->success(__('Report category added successfully!'));

        return to_route('admin.ads.report.category.index');
    }

    public function edit($id)
    {
        $category = AdsReportCategory::findOrFail($id);
        return view('backend.ads.report.category.edit',compact('category'));
    }

    public function update(Request $request,$id)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'status' => 'required|boolean',
        ]);

        if ($validator->fails()) {
            notify()->error($validator->errors()->first());

            return redirect()->back()->withInput();
        }

        $category = AdsReportCategory::findOrFail($id);

        $category->update([
            'name' => $request->get('name'),
            'status' => $request->boolean('status'),
        ]);

        notify()->success(__('Report category updated successfully!'));

        return to_route('admin.ads.report.category.index');
    }

    public function destroy($id)
    {
        $category = AdsReportCategory::findOrFail($id);
        $category->delete();

        notify()->success(__('Report category deleted successfully!'));
        return to_route('admin.ads.report.category.index');
    }
}
