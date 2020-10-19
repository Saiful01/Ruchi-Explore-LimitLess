<?php

namespace App\Http\Controllers;

use App\Product;
use App\ProductCategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories= ProductCategory::get();
        return view('admin.product.create')->with('categories',$categories );
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        unset($request['_token']);

        if ($request->hasFile('Product_image')) {


            $image = $request->file('Product_image');
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/images/product');
            $image->move($destinationPath, $image_name);
            $array = [

                'product_name' => $request['product_name'],
                'product_details' => $request['product_details'],
                'available_in' => $request['available_in'],
                'url_link' => $request['url_link'],
                'Product_price' => $request['Product_price'],
                'product_category_id' => $request['product_category_id'],
                'product_image' => $image_name,
            ];
        } else {
           $array = [
                'product_name' => $request['product_name'],
               'product_details' => $request['product_details'],
                'available_in' => $request['available_in'],
                'url_link' => $request['url_link'],
                'Product_price' => $request['Product_price'],
                'product_category_id' => $request['product_category_id'],
            ];

        }

        try {
            Product::create($array);
            return back()->with('success', "Successfully save Product ");
        }
        catch (\Exception $exception){
            return back()->with('failed', $exception->getMessage());

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {

        $result=Product::join('product_categories', 'product_categories.product_category_id', '=', 'products.product_category_id')
            ->orderBy('products.created_at','DESC')
            ->get();
        return view('admin.product.show')->with('result',$result );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit( $product_id)
    {
        $result = Product::where('product_id', $product_id)->first();

        return view('admin.product.edit')
            ->with('categories', ProductCategory::get())
            ->with('result', $result);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        unset($request['_token']);
        if ($request->hasFile('Product_image')) {


            $image = $request->file('Product_image');
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/images/product');
            $image->move($destinationPath, $image_name);
            $array = [

                'product_name' => $request['product_name'],
                'product_details' => $request['product_details'],
                'available_in' => $request['available_in'],
                'url_link' => $request['url_link'],
                'Product_price' => $request['Product_price'],
                'product_category_id' => $request['product_category_id'],
                'product_image' => $image_name,
            ];
        } else {
            $array = [
                'product_name' => $request['product_name'],
                'product_details' => $request['product_details'],
                'available_in' => $request['available_in'],
                'url_link' => $request['url_link'],
                'Product_price' => $request['Product_price'],
                'product_category_id' => $request['product_category_id'],
            ];

        }
        try {
            Product::where('product_id', $request['product_id'])->update($array);
            return back()->with('success', "Successfully  Product Updated ");
        }
        catch (\Exception $exception){
            return back()->with('failed', $exception->getMessage());

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        try {
            Product::where('product_id', $id)->delete();
            return back()->with('success', "Successfully  Product Deleted ");
        }
        catch (\Exception $exception){
            return back()->with('failed', $exception->getMessage());

        }

    }
}
