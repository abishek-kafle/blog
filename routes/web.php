<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Category
Route::get('/categories', [App\Http\Controllers\CategoryController::class, 'index'])->name('category.index');
Route::get('/categories/add', [App\Http\Controllers\CategoryController::class, 'add'])->name('category.add');
Route::post('/categories/store', [App\Http\Controllers\CategoryController::class, 'store'])->name('category.store');
Route::get('/categories/delete/{id}', [App\Http\Controllers\CategoryController::class, 'delete'])->name('category.delete');

// Blog
Route::get('/blogs', [App\Http\Controllers\BlogController::class, 'index'])->name('blog.index');

// Author
Route::get('/authors', [App\Http\Controllers\AuthorController::class, 'index'])->name('author.index');
Route::get('/authors/add', [App\Http\Controllers\AuthorController::class, 'add'])->name('author.add');
Route::post('/authors/store', [App\Http\Controllers\AuthorController::class, 'store'])->name('author.store');
