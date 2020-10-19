<?php

namespace App\Http\Controllers;

use App\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.video.create');
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
        //$author_id = Auth::user()->id; TODO:: Need to Uncomment

        $author_id=$request['author_id'] ;//TODO:: Need to Comment


        if ($request['youtube_links'] != null) {
            $video_id = explode("?v=", $request['youtube_links']);

            if (count($video_id) > 1) {
                $video_explode = explode("&", $video_id[1]);
                if (count($video_explode) > 0) {
                    $video_id = $video_explode[0];
                } else {
                    $video_id = $video_id[1];
                }
            } else {
                $video_id = null;
            }

        } else {
            $video_id = null;
        }


        if ($request->hasFile('video_image')) {


            $image = $request->file('video_image');
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/images/video_image');
            $image->move($destinationPath, $image_name);
            $array = [

                'video_title' => $request['video_title'],
                'video_details' => $request['video_details'],
                'youtube_links' => $video_id,
                'author_id' => $author_id,
                'is_beauty_gram' => $request['is_beauty_gram'],
                'video_image' => $image_name,
            ];
        } elseif ($request->hasFile('video')) {


            $video = $request->file('video');
            $video_name = time() . '.' . $video->getClientOriginalExtension();
            $destinationPath = public_path('/images/video');
            $video->move($destinationPath, $video_name);
            $array = [

                'video_title' => $request['video_title'],
                'video_details' => $request['video_details'],
                'youtube_links' => $video_id,
                'author_id' => $author_id,
                'is_beauty_gram' => $request['is_beauty_gram'],
                'video' => $video_name,
            ];
        } else {
            $array = [

                'video_title' => $request['video_title'],
                'video_details' => $request['video_details'],
                'youtube_links' => $video_id,
                'author_id' => $author_id,
                'is_beauty_gram' => $request['is_beauty_gram'],
            ];

        }

        try {
            Video::create($array);
            return back()->with('success', "Successfully Video Saved");
        } catch (\Exception $exception) {

            return back()->with('failed', $exception->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Video $video
     * @return \Illuminate\Http\Response
     */
    public function show(Video $video)
    {
        $result = Video::get();
        return view('admin.video.show')->with('result', $result);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Video $video
     * @return \Illuminate\Http\Response
     */
    public function edit($video_id)
    {
        $result = Video::where('video_id', $video_id)->first();
        return view('admin.video.edit')->with('result', $result);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Video $video
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Video $video)
    {
        unset($request['_token']);
        $request['author_id'] = Auth::user()->id;


        if ($request['youtube_links'] != null) {
            $video_id = explode("?v=", $request['youtube_links']);
            if (count($video_id) > 1) {

                $video_explode = explode("&", $video_id[1]);
                if (count($video_explode) > 0) {
                    $video_id = $video_explode[0];
                } else {
                    $video_id = $video_id[1];
                }
            } else {
                $video_id = $request['youtube_links'];
            }


        } else {
            $video_id = null;
        }

        $array = [

            'video_title' => $request['video_title'],
            'video_details' => $request['video_details'],
            'youtube_links' => $video_id,
            'is_beauty_gram' => $request['is_beauty_gram'],
            'author_id' => $request['author_id']

        ];


        if ($request->hasFile('video_image')) {

            $image = $request->file('video_image');
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/images/video_image');
            $image->move($destinationPath, $image_name);
            $array['video_image'] = $image_name;
        }

        if ($request->hasFile('video')) {


            $video = $request->file('video');
            $video_name = time() . '.' . $video->getClientOriginalExtension();
            $destinationPath = public_path('/images/video');
            $video->move($destinationPath, $video_name);
            $array['video'] = $video_name;
        }


        try {
            Video::where('video_id', $request['video_id'])->update($array);
            return back()->with('success', "Successfully Video Updated");
        } catch (\Exception $exception) {

            return back()->with('failed', $exception->getMessage());
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Video $video
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            Video::where('video_id', $id)->delete();
            return back()->with('success', "Successfully Deleted");

        } catch (\Exception $exception) {
            return back()->with('failed', $exception->getMessage());
        }
    }
}
