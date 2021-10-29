<?php

use Illuminate\Support\Facades\Route;
use Rap2hpoutre\LaravelLogViewer\LogViewerController;
use App\Http\Controllers\Web\AuthController;
use App\Http\Controllers\Web\HomeController;

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
   Route::get('/', [HomeController::class,'index'])->name('home');
});



