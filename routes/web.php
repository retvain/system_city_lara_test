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

//Route::get('/', function () {
//    return view('Store.index');
//});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'store'], function () {
    $methods = ['index', 'edit', 'update', 'create', 'store', 'show', 'destroy'];
    Route::resource('cat', \App\Http\Controllers\Store\StoreController::class)
        ->only($methods)
        ->names('store.cat');
});

// Restore Cat
Route::get('store/cat/{cat}/restore', [\App\Http\Controllers\Store\StoreController::class, 'restore'])
    ->name('store.cat.restore');
