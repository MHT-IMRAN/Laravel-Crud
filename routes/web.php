<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;

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
    return view('index');
});

// Crud routes
Route::middleware('auth')->group(function () {
    Route::controller(PostController::class)->group(function () {
        Route::get('/make', 'create')->name('create');
        Route::post('/new/post', 'store')->name('store');
        Route::get('/trash/{post}', 'destroy')->name('delete');
        Route::get('/update/form/{post}', 'edit')->name('update_form');
        Route::post('/update/store/{post}', 'update')->name('update');
    });
});

//Authentication routes
Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->name('home');

// Fallback route 
Route::fallback(function () {
    return response()->json('No route has been found');
});
