<?php

use Illuminate\Support\Facades\Route;
use Rap2hpoutre\LaravelLogViewer\LogViewerController;
use App\Http\Controllers\Web\AuthController;
use App\Http\Controllers\Web\HomeController;
use App\Http\Controllers\Web\CategoryController;
use App\Http\Controllers\Web\PostController;
use App\Http\Controllers\Web\TagsController;

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


Route::get('/login', [AuthController::class,'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.exec');
Route::get('logs', [LogViewerController::class, 'index'])->name('logs');

// SOLO AUTENTICATI
Route::group(['middleware' => ['auth']], function () {
   Route::get('/logout',  [AuthController::class, 'logout'])->name('logout');
   Route::get('/', [HomeController::class,'index'])->name('home');
   Route::get('/categories',[CategoryController::class,'index'])->name('categories');
   Route::get('/category/{id}',[CategoryController::class,'show'])->name('category');
   Route::get('/category/create',[CategoryController::class,'create'])->name('category.create');
   Route::post('category',[CategoryController::class,'store'])->name('category.store');
   Route::get('/posts',[PostController::class,'index'])->name('posts');
   Route::get('/post/create',[PostController::class,'create'])->name('post.create');
   Route::get('/post/delete/{id}',[PostController::class,'delete'])->name('post.delete');
   Route::get('/post/edit/{id}',[PostController::class,'edit'])->name('post.edit');
   Route::get('/post/{id}',[PostController::class,'show'])->name('post');
   Route::post('/post',[PostController::class,'store'])->name('post.store');
   Route::post('/post/update',[PostController::class,'update'])->name('post.update');
   Route::get('/tags',[TagsController::class,'index'])->name('tags');
   Route::get('/tags/create',[TagsController::class,'create'])->name('tags.create');
   Route::get('/tags/delete/{id}',[TagsController::class,'delete'])->name('tags.delete');
   Route::post('/tags',[TagsController::class,'store'])->name('tags.store');
});



