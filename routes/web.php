<?php

use App\Http\Controllers\ProductController;
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
Route::controller(ProductController::class)
    ->name('product.')->group(function () {
        Route::get('', 'index')->name('index');
        Route::post('search', 'search')->name('search');
        Route::post('create', 'store')->name('create');
        Route::put('update/{id}', 'edit')->name('edit');
        Route::delete('delete/{id}', 'delete')->name('delete');
    });
