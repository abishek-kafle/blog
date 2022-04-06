<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    // Index
    public function index(){
        return view('blog.index');
    }
}
