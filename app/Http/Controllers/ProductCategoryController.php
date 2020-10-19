<?php

namespace App\Http\Controllers;

use App\ProductCategory;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.product_category.create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        unset($request['_token']);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image_name = "featured_" . time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/images/product_category');
            $image->move($destinationPath, $image_name);
            $request['featured_image'] = $image_name;
        }

        if ($request->hasFile('slider_image2')) {
            $image = $request->file('slider_image2');
            $image_name = "category_" . time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/images/product_category');
            $image->move($destinationPath, $image_name);
            $request['slider_image'] = $image_name;
        }


        try {
            ProductCategory::create($request->except(['image', 'slider_image2', '_token']));
            return back()->with('success', "Successfully save Product Category name");
        } catch (\Exception $exception) {
            return back()->with('failed', $exception->getMessage());

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ProductCategory $productCategory
     * @return \Illuminate\Http\Response
     */
    public function show(ProductCategory $productCategory)
    {
        $result = ProductCategory::get();
        return view('admin.product_category.show')->with('result', $result);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProductCategory $productCategory
     * @return \Illuminate\Http\Response
     */
    public function edit($productCategory_id)
    {
        $result = ProductCategory::where('product_category_id', $productCategory_id)->first();
        return view('admin.product_category.edit')->with('result', $result);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\ProductCategory $productCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductCategory $productCategory)
    {

        unset($request['_token']);


        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image_name = "featured_" . time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/images/product_category');
            $image->move($destinationPath, $image_name);
            $request['featured_image'] = $image_name;

        }

        if ($request->hasFile('slider_image2')) {
            $image = $request->file('slider_image2');
            $image_name = "category_" . time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/images/product_category');
            $image->move($destinationPath, $image_name);
            $request['slider_image'] = $image_name;

        }

        $data = $request->except(['image', 'slider_image2', '_token']);

        try {
            ProductCategory::where('product_category_id', $request['product_category_id'])->update($data);
            return back()->with('success', "Successfully Update Product Category ");
        } catch (\Exception $exception) {
            return back()->with('failed', $exception->getMessage());

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProductCategory $productCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            ProductCategory::where('product_category_id', $id)->delete();
            return back()->with('success', "Successfully Deleted Product Category name");
        } catch (\Exception $exception) {
            return back()->with('failed', $exception->getMessage());

        }
    }
}
