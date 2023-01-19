<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EnggineerController;


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

// Login
// Route::get('logout', function ()
// {
//     auth()->logout();
//     Session()->flush();
//     return Redirect::to('/login');
// })->name('logout');

// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified'
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });

// View
Route::get('/', function () {
    return view('auth.login');
});

Route::get('/home', function () {
    return view('index');
});

Route::get('/enggineer', function () {
    return view('enggineer');
});

// Route::get('/admin', function () {
//     return view('admin');
// });

// Route
Route::resource('/users', \App\Http\Controllers\HomeController::class);
Route::resource('/enggineer', \App\Http\Controllers\EnggineerController::class);




