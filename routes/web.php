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


// ADMIN GROUP ROUTE
Route::prefix('admin')->middleware(['auth','isAdmin'])->group(function() {

    // admin dashboard
    Route::get('dashboard',[App\Http\Controllers\Admin\DashboardController::class, 'index'] );

    // CATEGORIES  GROUP ROUTE
    Route::controller(App\Http\Controllers\Admin\CategoryController::class)->group(function () {
        Route::get('/categories', 'index');
        Route::get('/categories/create', 'create');
        Route::post('/categories', 'store');
        Route::get('/categories/create', 'create');
        Route::get('/categories/{category}/edit', 'edit');
        Route::put('/categories/{category}', 'update');


    });





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


