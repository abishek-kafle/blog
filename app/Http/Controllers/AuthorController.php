<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthorController extends Controller
{
    // Index
    public function index(){
        return view('author.index');
    }
}
