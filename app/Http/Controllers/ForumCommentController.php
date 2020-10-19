<?php

namespace App\Http\Controllers;

use App\ForumComment;
use Illuminate\Http\Request;

class ForumCommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function commentnotspam($id)
    {
        try {
            ForumComment::where('comment_id', $id)->update([
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
            ForumComment::where('comment_id', $id)->update([
               'is_spam' => true
            ]);
            return back()->with('success', "Successfully Spam");
        }
        catch (\Exception $exception) {

            return back()->with('success', $exception->getMessage());
        }

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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ForumComment  $forumComment
     * @return \Illuminate\Http\Response
     */
    public function show(ForumComment $forumComment)
    {
        $comment= ForumComment::get();
        return view('admin.forum.comment')->with('comment', $comment);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ForumComment  $forumComment
     * @return \Illuminate\Http\Response
     */
    public function edit(ForumComment $forumComment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ForumComment  $forumComment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ForumComment $forumComment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ForumComment  $forumComment
     * @return \Illuminate\Http\Response
     */
    public function destroy(ForumComment $forumComment)
    {
        //
    }
}
