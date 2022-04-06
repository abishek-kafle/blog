<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;

class CategoryController extends Controller
{
    // Read
    public function index(){
        Session::put('admin','category');
        $categories = Category::orderBy('id', 'desc');
        return view('category.index')->with('categories', $categories);
    }

    // Add
    public function add(){
        return view('category.add');
    }

    // Store
    public function store(Request $request){
        $data = $request->all();
        $rules = [];
        $customMessage = [];
        $this->validate($request, $rules, $customMessage);
    }

    // Delete
    public function delete($id){

    }
}
