<?php

namespace App\Http\Controllers;

use App\BlogComment;
use Illuminate\Http\Request;

class BlogCommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function commentnotspam($id)
    {
        try {
            BlogComment::where('blog_comment_id', $id)->update([
                'is_spam' => false
            ]);
            return back()->with('success', "Successfully Inspam");
        }
        catch (\Exception $exception) {

            return back()->with('success', $exception->getMessage());
        }

    }
    public function commentspam($id)
    {
        try {
            BlogComment::where('blog_comment_id', $id)->update([
                'is_spam' => true
            ]);
            return back()->with('success', "Successfully Spam");
        }
        catch (\Exception $exception) {

            return back()->with('success', $exception->getMessage());
        }

    }
    public function index()
    {
        //
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
        try {
            BlogComment::create($request->all());
            return back()->with('success', "Successfully saved");
        }
        catch (\Exception $exception){
            return back()->with('failed', $exception->getMessage());
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BlogComment  $blogComment
     * @return \Illuminate\Http\Response
     */
    public function show(BlogComment $blogComment)
    {
        $result=BlogComment::orderBy('created_at','DESC')->get();
        return view('admin.blog.comment')->with('result', $result);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BlogComment  $blogComment
     * @return \Illuminate\Http\Response
     */
    public function edit(BlogComment $blogComment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BlogComment  $blogComment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BlogComment $blogComment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BlogComment  $blogComment
     * @return \Illuminate\Http\Response
     */

}
