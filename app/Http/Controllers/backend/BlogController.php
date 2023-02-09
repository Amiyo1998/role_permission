<?php

namespace App\Http\Controllers\backend;

use App\Models\Blog;
use Illuminate\Http\Request;
use App\Http\Requests\BlogRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{

    public $user;

    public function __construct()
    {
        $this->middleware(function ($request, $next){
            $this->user = Auth::guard('admin')->user();
            return $next($request);
        });
    }
    public function index()
    {
        if (is_null($this->user) || !$this->user->can('blog.view')) {
            abort(403, 'Sorry!! You are Unauthorized to view any blog!');
        }
        $data['title'] = "Blog";
        $data['blogs'] = Blog::all();
        return view('backend.pages.blogs.index', $data);
    }

    public function create()
    {
        if (is_null($this->user) || !$this->user->can('blog.create')) {
            abort(403, 'Sorry!! You are Unauthorized to create any blog!');
        }
        $data['title'] = "Blog/Create";
        return view('backend.pages.blogs.create', $data);
    }

    public function store(BlogRequest $request)
    {
        if (is_null($this->user) || !$this->user->can('blog.create')) {
            abort(403, 'Sorry!! You are Unauthorized to create any blog!');
        }
        $path = '';
        if($request->hasFile("image")){
            $path = $request->file("image")->store('images/blogs');
        }
        $blog = Blog::create([
            'name' =>$request->get('name'),
            'description' =>$request->get('description'),
            'image' => $path,
        ]);
        if(empty($blog)) {
            return redirect()->back();
        }
        return redirect()->route('blogs.index')->with('message', 'Blog created successfull!!');

    }

    public function show($id)
    {
        //
    }

    public function edit(Blog $blog)
    {
        if (is_null($this->user) || !$this->user->can('blog.edit')) {
            abort(403, 'Sorry!! You are Unauthorized to edit any blog!');
        }
        $data['title'] = "Blog/Edit";
        $data['blog'] = $blog ;
        return view('backend.pages.blogs.edit', $data);
    }

    public function update(BlogRequest $request, Blog $blog)
    {
        if (is_null($this->user) || !$this->user->can('blog.edit')) {
            abort(403, 'Sorry!! You are Unauthorized to edit any blog!');
        }
        $path = '';
        if($blog->image){
           Storage::delete($blog->image);
        }
        if($request->hasFile("image")){
            $path = $request->file("image")->store('images/blogs');
        }
        $params = $request->only(['name','description']);
        $params['image'] = $path;
        if($blog->update($params))
        {
            return redirect()->route('blogs.index')->with('message', 'Blog edited successfull!!');
        }
    }

    public function destroy(Blog $blog)
    {
        if (is_null($this->user) || !$this->user->can('blog.delete')) {
            abort(403, 'Sorry!! You are Unauthorized to delete any blog!');
        }
        if(Storage::delete($blog->image)) {
            $blog->delete();
        }
        return redirect()->back()->with('message', 'Blog deleted successfull!!');
    }
}
