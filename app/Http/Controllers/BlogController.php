<?php

namespace App\Http\Controllers;

use App\Blog;
use App\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function blogunpublished($id)
    {

        try {

            Blog::where('blog_id', $id)->update([
                'publish_status' => false
            ]);
            return back()->with('success', "Successfully Unpublished");
        } catch (\Exception $exception) {

            return back()->with('success', $exception->getMessage());
        }
    }

    public function blogpublished($id)
    {
        try {
            Blog::where('blog_id', $id)->update([
                'publish_status' => true
            ]);
            return back()->with('success', "Successfully Published");
        } catch (\Exception $exception) {

            return back()->with('success', $exception->getMessage());
        }
    }

    public function index()
    {
        return view('admin.post.create')->with('categories', BlogCategory::get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.post.create')
            ->with('categories', BlogCategory::get());

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        return $request;
        unset($request['_token']);
        $blog_details = $this->getSummernoteValue($request['blog_details']);

        $request['blog_details']=$blog_details;
        $request->validate([
            'category_id' => 'required',
            'image' => 'required',


        ]);

        //$request['author_id'] = Auth::user()->id;//TODO::Uncomment
        $request['author_id'] = $request['author_id'];//TODO::COMMent
        if ($request->hasFile('image')) {

            $image = $request->file('image');
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $directory = public_path('/images/blog');
            $image->move($directory, $image_name);

            $request['featured_image'] = $image_name;
        }

        $request['category_id'] = json_encode($request['category_id']);
        $data = $request->except(['image','files', '_token']);

        try {
            Blog::create($data);
            return back()->with('success', "Successfully Post Saved");
        } catch (\Exception $exception) {

            return $exception->getMessage();
            return back()->with('failed', "There is a problem. Try Again");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Blog $blog
     * @return \Illuminate\Http\Response
     */
    private function getSummernoteValue($input_value)
    {

        $detail = $input_value;

        $dom = new \domdocument();
        //$dom->loadHtml($detail, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);

        $dom->loadHTML(mb_convert_encoding($detail, 'HTML-ENTITIES', 'UTF-8'));

        $images = $dom->getelementsbytagname('img');

        try {
            foreach ($images as $k => $img) {
                $data = $img->getattribute('src');

                list($type, $data) = explode(';', $data);
                list(, $data) = explode(',', $data);

                $data = base64_decode($data);
                $image_name = time() . $k . '.png';
                $path = public_path() . '/images/blog/post/' . $image_name;

                file_put_contents($path, $data);

                $img->removeattribute('src');
                $img->setattribute('src', '/images/blog/post/' . $image_name);
            }
        } catch (\Exception $e) {

        }

        $detail = $dom->savehtml();
        return $detail;
    }


    public function show(Request $request)
    {

        // return Category::whereNotIn('parent_category', [0])->get();
        if ($request->method() == "POST") {
            $query = Blog::orderBy('created_at', "DESC");
            if ($request['query'] != null) {
                $query = $query->where('blog_title', 'LIKE', '%' . $request['query'] . '%');
            }
            if ($request['category_id'] != "All") {
                $id = $request['category_id'];
                $query = $query->whereRaw("JSON_CONTAINS(blogs.category_id, '[$id]' )");
            }

            $result = $query->paginate(15);
        } else {

            $result = Blog::orderBy('created_at', "DESC")->paginate(15);
        }

        return view('admin.blog.post')
            ->with('categories', BlogCategory::get())
            ->with('result', $result);
    }

    public function postshow(Blog $blog)
    {
        $result = Blog::where('author_id', Auth::user()->id)->get();
        return view('admin.post.show')->with('result', $result);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Blog $blog
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $result = Blog::where('blog_id', $id)->first();
        return view('admin.post.edit')->with('result', $result)
            ->with('categories', BlogCategory::get());

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Blog $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        //        return $request;
        unset($request['_token']);
        $blog_details = $this->getSummernoteValue($request['blog_details']);

        $request['blog_details']=$blog_details;

        if ($request->hasFile('image')) {

            $image = $request->file('image');
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $directory = public_path('/images/blog');
            $image->move($directory, $image_name);
            $request['featured_image'] = $image_name;
        }

        $request['category_id'] = json_encode($request['category_id']);
        $data = $request->except(['image','files', '_token']);

        try {
            Blog::where('blog_id', $request['blog_id'])->update($data);
            return back()->with('success', "Successfully Post updated");
        } catch (\Exception $exception) {

            // return $exception->getMessage();
            return back()->with('failed', "There is a problem. Try Again");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Blog $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            Blog::where('author_id', Auth::user()->id)->delete();
            return back()->with('success', "Successfully Post Deleted");
        } catch (\Exception $exception) {

            // return $exception->getMessage();
            return back()->with('failed', "There is a problem. Try Again");
        }
    }
}
