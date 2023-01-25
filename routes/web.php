<?php

use Illuminate\Support\Facades\Route;

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


// ADMIN
Route::prefix('admin')->middleware(['auth','isAdmin'])->group(function() {

    // admin dashboard
    Route::get('dashboard',[App\Http\Controllers\Admin\DashboardController::class, 'index'] );
    // view category
    Route::get('categories',[App\Http\Controllers\Admin\CategoryController::class, 'index'] );
    // create categories
    Route::get('categories/create',[App\Http\Controllers\Admin\CategoryController::class, 'create'] );
    // create categories
    Route::post('categories',[App\Http\Controllers\Admin\CategoryController::class, 'store'] );


});




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Logout
Route::get('/logout', function(){
    Auth::logout();
    return Redirect::to('login');
 });


