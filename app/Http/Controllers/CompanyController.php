<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function show()
{
    $result = Company::all();
    return view('admin.company.show')->with('result', $result);
}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.company.create');
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
            $directory = public_path('/images/company');
            $image->move($directory, $image_name);
            $request['featured_image'] = $image_name;
        }


        try {
            Company::create($request->except(['image', '_token', 'files']));
            return back()->with('success', 'Company Added Successfully');
        } catch (\Exception $exception) {

            return back()->with('failed', $exception->getMessage());
        }

    }

    public function edit($id)
    {
        $category = Company::where('company_id', $id)->first();
        return view('admin.company.edit')->with('result', $category);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Company $blogCompany
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // return $request->all();

        if ($request->hasFile('image')) {

            $image = $request->file('image');
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $directory = public_path('/images/company');
            $image->move($directory, $image_name);
            $request['featured_image'] = $image_name;
        }

        // return $request->except(['image', '_token', 'files']);

        try {
            Company::where('company_id', $request['company_id'])->update($request->except(['image', '_token', 'files']));
            return back()->with('success', "Successfully Updated");
        } catch (\Exception $exception) {

            return back()->with('failed', $exception->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Company $blogCompany
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {

        Company::where('company_id', $id)->delete();
        return back()->with('success', 'Company successfully deleted');

    }
}
