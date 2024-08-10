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
Route::put('users/{user}', [UserController::class, 'update'])->name('users.update');
Route::delete('users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
Route::get('logout', [UserController::class, 'logout'])->name('logout');


/*
|--------------------------------------------------------------------------
| Categories Routes
|--------------------------------------------------------------------------
*/
Route::get('categories/index', [CategoryController::class, 'index'])->name('categories.index');
Route::get('categories/create', [CategoryController::class, 'create'])->name('categories.create');
Route::post('categories', [CategoryController::class, 'store'])->name('categories.store');
Route::get('categories/{category}/edit/', [CategoryController::class, 'edit'])->name('catyegory.edit');
Route::put('categories/{category}/', [CategoryController::class, 'update'])->name('catyegory.update');
Route::delete('categories/{category}/', [CategoryController::class, 'destroy'])->name('catyegory.destroy');



/*
|--------------------------------------------------------------------------
| Tags Routes
|--------------------------------------------------------------------------
*/
Route::get('tags/index', [TagController::class, 'index'])->name('tags.index');
Route::get('tags/create', [TagController::class, 'create'])->name('tags.create');
Route::post('tags', [TagController::class, 'store'])->name('tags.store');
Route::get('tags/{tag}/edit/', [TagController::class, 'edit'])->name('tag.edit');
Route::put('tags/{tag}/', [TagController::class, 'update'])->name('tag.update');
Route::delete('tags/{tag}/', [TagController::class, 'destroy'])->name('tag.destroy');



/*
|--------------------------------------------------------------------------
| Blogposts Routes
|--------------------------------------------------------------------------
*/
Route::get('/', [BlogpostController::class, 'index'])->name('blogposts.index');

Route::get('blogposts/manage', [BlogpostController::class, 'manage'])->name('blogposts.manage');
Route::get('blogposts/create', [BlogpostController::class, 'create'])->name('blogposts.create');
Route::post('blogposts', [BlogpostController::class, 'store'])->name('blogposts.store');
Route::get('blogposts/{tag}/edit/', [BlogpostController::class, 'edit'])->name('blogposts.edit');
Route::put('blogposts/{tag}/', [BlogpostController::class, 'update'])->name('blogposts.update');
Route::delete('blogposts/{tag}/', [BlogpostController::class, 'destroy'])->name('blogposts.destroy');
Route::get('{slug}', [BlogpostController::class, 'show'])->name('blogposts.show');





Route::get('/tags/search', [TagController::class, 'search'])->name('tags.search');