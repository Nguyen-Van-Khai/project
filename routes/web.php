<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Admin\DashboardController;
use \App\Http\Controllers\Admin\ProductController;

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

Route::group(['prefix'=>'backend'], function (){
    Route::get('dashboard', [DashboardController::class, 'index']);

    Route::group(['prefix'=>'product'], function (){
        Route::get('', [ProductController::class, 'index']);
        Route::get('create', [ProductController::class, 'create']);
        Route::post('store', [ProductController::class, 'store']);
        Route::delete('delete/{id}', [ProductController::class, 'delete']);
        Route::get('edit/{id}', [ProductController::class, 'edit']);
        Route::put('update/{id}', [ProductController::class, 'update']);
    });
});

