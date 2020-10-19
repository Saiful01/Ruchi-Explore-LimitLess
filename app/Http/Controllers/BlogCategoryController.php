<?php

namespace App\Http\Controllers;

use App\BlogCategory;
use Illuminate\Http\Request;

class BlogCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $result = BlogCategory::all();
        return view('admin.blog_category.show_category')->with('result', $result);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createCategory()
    {
        return view('admin.blog_category.create_category');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function storeCategory(Request $request)
    {

        if ($request->hasFile('image')) {

            $image = $request->file('image');
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $directory = public_path('/images/category');
            $image->move($directory, $image_name);
            $request['featured_image'] = $image_name;
        }


        try {
            BlogCategory::create($request->except(['image', '_token', 'files']));
            return back()->with('success', 'Category Added Successfully');
        } catch (\Exception $exception) {

            return back()->with('failed', $exception->getMessage());
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BlogCategory $blogCategory
     * @return \Illuminate\Http\Response
     */
//    public function show(BlogCategory $blogCategory)
//    {
//        //
//    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BlogCategory $blogCategory
     * @return \Illuminate\Http\Response
     */
    public function editCategory($id)
    {
        $category = BlogCategory::where('blog_category_id', $id)->first();
        return view('admin.blog_category.edit_blog_category')->with('result', $category);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\BlogCategory $blogCategory
     * @return \Illuminate\Http\Response
     */
    public function updateCategory(Request $request, $id)
    {
       // return $request->all();

        if ($request->hasFile('image')) {

            $image = $request->file('image');
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $directory = public_path('/images/category');
            $image->move($directory, $image_name);
            $request['featured_image'] = $image_name;
        }

       // return $request->except(['image', '_token', 'files']);

        try {
            BlogCategory::where('blog_category_id', $id)->update($request->except(['image', '_token', 'files']));
            return back()->with('success', "Successfully Updated");
        } catch (\Exception $exception) {

            return back()->with('failed', $exception->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BlogCategory $blogCategory
     * @return \Illuminate\Http\Response
     */
    public function deleteCategory($id)
    {

        BlogCategory::where('blog_category_id', $id)->delete();
        return back()->with('success', 'Catagory successfully deleted');

    }
}
