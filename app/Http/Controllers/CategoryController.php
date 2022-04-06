<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    // Read
    public function index(){
        Session::put('admin','category');
        $categories = Category::orderBy('id', 'desc')->get();
        return view('category.index', compact('categories'));
    }

    // Add
    public function add(){
        return view('category.add');
    }

    // Store
    public function store(Request $request){
        $data = $request->all();
        $rules = [
            'title' => 'required|max:255'
        ];
        $customMessage = [
            'title.required' => 'Title field is required',
            'title.max' => 'Title should be only 255 characters'
        ];
        $this->validate($request, $rules, $customMessage);
        $category = new Category();
        $category->title = $data['title'];
        $category->description = $data['description'];

        $random = Str::random(10);
        if($request->hasFile('image')){
            $img_temp = $request->file('image');
            if($img_temp->isValid()){
                $extension = $img_temp->getClientOriginalExtension();
                $filename = $random.".".$extension;
                $image_path = 'uploads/'.$filename;
                Image::make($img_temp)->save($image_path);
                $category->image = $filename;
            }
        }
        $category->save();
        return view('category.index')->with(Session::flash('success_message', 'Category Added Successfully !!'));
    }

    // Delete
    public function delete($id){
        $category = Category::findOrFail($id);
        $category->delete();
        Session::flash('success_message', 'Category Deleted Successfully !!');
        return redirect()->back();
    }
}
