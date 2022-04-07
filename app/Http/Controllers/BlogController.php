<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BlogController extends Controller
{
    // Index
    public function index(){
        Session::put('admin','blog');
        $blogs = Blog::orderBy('id','desc')->get();
        return view('blog.index', compact('blogs'));
    }

    public function add(){
        $categories = Category::all();
        $authors = Author::all();
        return view('blog.add', compact(['categories','authors']));
    }

    public function store(Request $request){
        $data = $request->all();
        //dd($data);
        $rules = [
            'title' => 'required',
            'content' => 'required'
        ];

        $customMessage = [
            'title.required' => 'Title field is required',
            'content.required' => 'Content field is required'
        ];

        $this->validate($request, $rules, $customMessage);
        $blog = new Blog();
        $blog->title = $data['title'];
        $blog->content = $data['content'];
        $blog->category = $data['category'];
        $blog->author = $data['author'];
        $blog->save();
        return redirect()->back()->with(Session::flash('success_message','Blog Added Successfully'));
    }

    public function edit($id){
        $blog = Blog::findOrFail($id);
        $categories = Category::all();
        $authors = Author::all();
        return view('blog.edit',compact(['blog','categories','authors']));
    }

    public function update(Request $request, $id){
        $data = $request->all();
        //dd($data);
        $rules = [
            'title' => 'required',
            'content' => 'required'
        ];

        $customMessage = [
            'title.required' => 'Title field is required',
            'content.required' => 'Content field is required'
        ];

        $this->validate($request, $rules, $customMessage);
        $blog = Blog::findOrFail($id);
        $blog->title = $data['title'];
        $blog->content = $data['content'];
        $blog->category = $data['category'];
        $blog->author = $data['author'];
        $blog->save();
        return redirect()->back()->with(Session::flash('success_message','Blog Updated Successfully'));
    }

    public function delete($id){
        $blog = Blog::findOrFail($id);
        $blog->delete();
        Session::flash('success_message', 'Blog Deleted Successfully');
        return redirect()->back();
    }
}
