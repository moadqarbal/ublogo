<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\BlogpostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TagController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


/*
|--------------------------------------------------------------------------
| users Routes
|--------------------------------------------------------------------------
*/
Route::get('signup', [UserController::class, 'create'])->name('signup');
Route::post('users', [UserController::class, 'store'])->name('users.store');
Route::get('signin', [UserController::class, 'signin'])->name('signin');
Route::post('authenticate', [UserController::class, 'authenticate'])->name('authenticate');
Route::get('users/{user}/edit/', [UserController::class, 'edit'])->name('user.edit');
Route::get('logout', [UserController::class, 'logout'])->name('logout');


Route::get('/', function () { return view('blogposts.index');});
Route::resource('users', UserController::class);
Route::resource('blogposts', BlogpostController::class);
Route::resource('comments', CommentController::class);
Route::resource('categories', CategoryController::class);
Route::resource('tags', TagController::class);