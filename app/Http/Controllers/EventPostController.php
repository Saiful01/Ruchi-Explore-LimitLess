<?php

namespace App\Http\Controllers;

use App\Event;
use App\EventPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventPostController extends Controller
{
    public function index()
    {
        $events = Event::all();
        return view('admin.event_post.create')->with('events', $events);
    }

    public function store(Request $request)
    {

        $request['author_id'] = Auth::user()->id;
        /* if ($request['event_post_youtube_links'] != null) {
             $video_id = explode("?v=", $request['event_post_youtube_links']);

             $video_explode = explode("&", $video_id[1]);
             if (count($video_explode) > 0) {
                 $video_id = $video_explode[0];
             } else {
                 $video_id = $video_id[1];
             }
         } else {
             $video_id = null;
         }*/


        if ($request->hasFile('image')) {

            $image = $request->file('image');
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/images/event_post_image');
            $image->move($destinationPath, $image_name);
            $request['event_post_image'] = $image_name;
        }
        else {
            $image_name = null;
        }
        $request['event_post_image'] = $image_name;
        $data = $request->except(['image', '_token']);


        try {
           EventPost::create($data);
            return back()->with('success', "Successfully Event Post Saved");
        } catch (\Exception $exception) {

            return back()->with('failed', $exception->getMessage());
        }
    }
    public function show(){
          $result = EventPost::all();
        return view('admin.event_post.show')->with('result',$result);
    }
    public function edit($eventPost_id)
    {
        $result = EventPost::where('event_post_id', $eventPost_id)->first();
        $events = Event::all();

        return view('admin.event_post.edit')
            ->with('result', $result)
            ->with('events', $events);
    }

    public function update(Request $request, EventPost $eventPost)
    {
        if ($request->hasFile('image')) {

            $image = $request->file('image');
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $directory = public_path('/images/event_post_image');
            $image->move($directory, $image_name);
            $request['event_post_image'] = $image_name;
        }
        $data = $request->except(['image', '_token']);

        try {
            EventPost::where('event_post_id', $request['event_post_id'])->update($data);
            return back()->with('success', "Successfully Post updated");
        } catch (\Exception $exception) {

            // return $exception->getMessage();
            return back()->with('failed', "There is a problem. Try Again");
        }

    }

    public function destroy($id)
    {
        try {
            EventPost::where('event_post_id', $id)->delete();
            return back()->with('success', "Successfully  Event Post Deleted ");
        } catch (\Exception $exception) {
            return back()->with('failed', $exception->getMessage());

        }

    }

}
