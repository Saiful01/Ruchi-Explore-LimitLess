<?php

namespace App\Http\Controllers;

use App\ForumComment;
use App\ForumLike;
use App\ForumTopic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class ForumTopicController extends Controller
{


    public function upvote(Request $request)
    {

        $user_id = Auth::user()->id;
        $is_voted = ForumLike::where('topic_id', $request['topic_id'])
            ->where('user_id', $user_id)
            ->first();
        if (!is_null($is_voted)) {
            return [
                'status_code' => 400,
                'message' => "Already Liked",
            ];
        }

        try {
            ForumLike::where('topic_id', $request['topic_id'])->create([
                'topic_id' => $request['topic_id'],
                'user_id' => $user_id,
            ]);

            return [
                'status_code' => 200,
                'message' => "Upvoted",
            ];

        } catch (\Exception $exception) {


            return [
                'status_code' => 400,
                'message' => $exception->getMessage()
            ];
        }
    }


    public function store(Request $request)
    {
        //$request->request->add(['user_id' => 1]); //add request
        try {
            ForumTopic::create($request->all());

            /* return [
                 'status_code' => 200,
                 'message' => "Successfully Saved",
             ];*/
            return Redirect::to('/forum')->with('success', "Successfully Saved");

        } catch (\Exception $exception) {


            return [
                'status_code' => 400,
                'message' => $exception->getMessage()
            ];
        }
    }

    public function show(ForumTopic $forumTopic)
    {
         $topics = ForumTopic::
        join('users', 'users.id', '=', 'forum_topics.user_id')
            ->orderBy('forum_topics.created_at', 'DESC')
            ->select('forum_topics.*', 'users.full_name','users.phone', 'users.email')
            ->paginate(10);
        return view('admin.forum.post')->with('topics', $topics);
    }

    public function getForumList(ForumTopic $forumTopic)
    {
        $topics = ForumTopic::
        join('users', 'users.id', '=', 'forum_topics.user_id')
            ->orderBy('forum_topics.created_at', 'DESC')
            ->get();


        foreach ($topics as $topic) {

            $count = ForumLike::where('topic_id', $topic->topic_id)->count();
            $topic->like = $count;

        }

        return $topics;

    }

    public function edit(ForumTopic $forumTopic)
    {
        //
    }

    public function create()
    {
        return view('common.pages.forum.create_forum');
    }

    public function update(Request $request, ForumTopic $forumTopic)
    {
        //
    }


    public function forumInactive($id)
    {

        try {
            ForumTopic::where('topic_id', $id)->update([
                'is_active' => false
            ]);

            return back()->with('success', "Successfully Updated");
        } catch (\Exception $exception) {

            return back()->with('failed', $exception->getMessage());
        }
    }

    public function forumActive($id)
    {

        try {
            ForumTopic::where('topic_id', $id)->update([
                'is_active' => true
            ]);
            return back()->with('success', "Successfully Updated");
        } catch (\Exception $exception) {

            return back()->with('failed', $exception->getMessage());
        }
    }

    public function destroy(ForumTopic $forumTopic)
    {
        //
    }

    public function details($id, $name)
    {
        $comments = ForumComment::where('topic_id', $id)
            ->join('users', 'users.id', '=', 'forum_comments.user_id')
            ->orderBy('forum_comments.created_at', 'DESC')
            ->get();
        return view('common.pages.forum.details')
            ->with('topic', ForumTopic::where('topic_id', $id)->join('users', 'users.id', '=', 'forum_topics.user_id')->first())
            ->with('comments', $comments)
            ->with('id', $id);
    }

    public function commentDetails($id)
    {
        return ForumComment::where('topic_id', $id)
            ->join('users', 'users.id', '=', 'forum_comments.user_id')
            ->orderBy('forum_comments.created_at', 'DESC')
            ->get();

    }

    public function commentStore(Request $request)
    {
        if (!Auth::check()) {
            return back()->with('failed', "Login To Continue");
        }
        $request['user_id'] = Auth::user()->id;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image_name = "comment_" . time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/images/comment');
            $image->move($destinationPath, $image_name);
            $request['comment_image'] = $image_name;

        }


        $data = $request->except(['image', '_token']);
        try {
            \App\ForumComment::create($data);
            return back()->with('success', "Successfully saved");

        } catch (\Exception $exception) {

            return back()->with('success', $exception->getMessage());

        }
    }

    public function commentDelete(Request $request)
    {

        $user_id = 1;
        try {

            ForumComment::where('comment_id', $request['comment_id'])
                ->where('user_id', $user_id)
                ->delete();
            return [
                'status_code' => 200,
                'message' => "Successfully Comment deleted"
            ];

        } catch (\Exception $exception) {

            return [
                'status_code' => 400,
                'message' => $exception->getMessage()
            ];
        }
    }
}
