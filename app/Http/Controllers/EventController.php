<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EventController extends Controller
{
    public function index()
    {
        return view('admin.event.create');
    }

    public function store(Request $request)
    {
        unset($request['token']);

        if ($request->hasFile('event_image')) {

            $image = $request->file('event_image');
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/images/event_image');
            $image->move($destinationPath, $image_name);
            $array = [
                'event_title_en' => $request['event_title_en'],
                'event_title_bn' => $request['event_title_bn'],
                'event_image' => $image_name,
                'event_starting_date' => $request['event_starting_date'],
                'event_ending_date' => $request['event_ending_date'],
                'event_address' => $request['event_address'],
                'author_id' => Auth::id()

            ];
        } else {
            $array = [
                'event_title_en' => $request['event_title_en'],
                'event_title_bn' => $request['event_title_bn'],
                'event_starting_date' => $request['event_starting_date'],
                'event_ending_date' => $request['event_ending_date'],
                'event_address' => $request['event_address'],
                'author_id' => Auth::id()

            ];
        }
        try {
            Event::create($array);
            return back()->with('success', "Successfully save Event ");
        } catch (\Exception $exception) {
            return back()->with('failed', $exception->getMessage());

        }

    }

    public function show(Event $event)
    {

        $result = Event::all();
        return view('admin.event.show')->with('result', $result);
    }

    public function edit($event_id)
    {
        $result = Event::where('id', $event_id)->first();

        return view('admin.event.edit')
            ->with('result', $result);
    }

    public function update(Request $request, Event $event)
    {
        unset($request['token']);
        $array = [
            'event_title_en' => $request['event_title_en'],
            'event_title_bn' => $request['event_title_bn'],
            'event_starting_date' => $request['event_starting_date'],
            'event_ending_date' => $request['event_ending_date'],
            'event_address' => $request['event_address'],
        ];

        try {
            Event::where('id', $request['event_id'])->update($array);
            return back()->with('success', "Successfully Updated Event ");
        } catch (\Exception $exception) {
            return back()->with('failed', $exception->getMessage());

        }

    }

    public function destroy($id)
    {
        try {
            Event::where('id', $id)->delete();
            return back()->with('success', "Successfully  Event Deleted ");
        } catch (\Exception $exception) {
            return back()->with('failed', $exception->getMessage());

        }

    }

    public function details($event_id)
    {


        $videos = DB::table('event_posts')
            ->join('events', 'event_posts.event_id', '=', 'events.id')
            ->where('events.id', '=', $event_id)
            ->whereNotNull('event_posts.event_post_youtube_links')
            ->select('event_posts.*')
            ->get();

        $images = DB::table('event_posts')
            ->join('events', 'event_posts.event_id', '=', 'events.id')
            ->where('events.id', '=', $event_id)
            ->whereNotNull('event_posts.event_post_image')
            ->select('event_posts.*')
            ->get();


        return view('admin.event_post.show')
            ->with('videos', $videos)
            ->with('images', $images);
    }


}
