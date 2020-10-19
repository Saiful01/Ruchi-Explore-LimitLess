<?php

namespace App\Http\Controllers;

use App\Company;
use App\Package;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    public function show()
    {

        $result = Package::join('companies', 'companies.company_id', '=', 'packages.company_id')->get();
        return view('admin.package.show')
            ->with('result', $result);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()

    {
        $categories=Company::get();
        return view('admin.package.create')->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if ($request->hasFile('image')) {

            $image = $request->file('image');
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $directory = public_path('/images/package');
            $image->move($directory, $image_name);
            $request['package_image'] = $image_name;
        }


        try {
            Package::create($request->except(['image', '_token', 'files']));
            return back()->with('success', 'Package Added Successfully');
        } catch (\Exception $exception) {

            return back()->with('failed', $exception->getMessage());
        }

    }

    public function edit($id)
    {

        $company=Company::get();
        $category = Package::join('companies', 'companies.company_id', '=', 'packages.company_id')
            ->where('packages.package_id', $id)
            ->first();
        return view('admin.package.edit')
            ->with('company', $company)
            ->with('result', $category);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Package $blogCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // return $request->all();

        if ($request->hasFile('image')) {

            $image = $request->file('image');
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $directory = public_path('/images/package');
            $image->move($directory, $image_name);
            $request['package_image'] = $image_name;
        }

        // return $request->except(['image', '_token', 'files']);

        try {
            Package::where('package_id', $request['package_id'])->update($request->except(['image', '_token', 'files']));
            return back()->with('success', "Successfully Updated");
        } catch (\Exception $exception) {

            return back()->with('failed', $exception->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Package $blogCategory
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {

        Package::where('package_id', $id)->delete();
        return back()->with('success', 'Catagory successfully deleted');

    }
}
