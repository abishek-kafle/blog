<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AuthorController extends Controller
{
    // Index
    public function index(){
        Session::put('admin','author');
        $authors = Author::orderBy('id', 'desc')->get();
        // dd($authors);
        return view('author.index', compact('authors'));
    }

    public function add(){
        return view('author.add');
    }

    public function store(Request $request){
        $data = $request->all();
        $rules = [
            'full_name' => 'required|max:255',
            'email' => 'required|unique:authors'
        ];
        $customMessage = [
            'full_name.required' => 'Full Name is required',
            'full_name.max' => 'Name field should not be more than 255 characters',
            'email.required' => 'Email field is required',
            'email.unique' => 'Email already exists'
        ];
        $this->validate($request, $rules, $customMessage);

        $author = new Author();
        $author->full_name = $data['full_name'];
        $author->email = $data['email'];
        $author->save();

        return view('author.index')->with(Session::flash('success_message', 'Author Added Successfully'));
    }
}
