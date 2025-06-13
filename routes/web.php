<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});


Route::prefix('categories')->controller(CategoryController::class)->as('category.')->group(function () {

    Route::get('/', 'allCategory')->name('all');


    Route::get('/create', 'categoryCreateView')->name('create');
    Route::post('/create', 'categoryCreate')->name('create');


    Route::get('/update/{category}', 'updateView')->name('update');
    Route::post('/update/{category}', 'update')->name('update');


    Route::get('/delete/{category}', 'destroy')->name('delete');
});


Route::prefix('products')->controller(ProductController::class)->as('products.')->group(function () {


    Route::get('/', 'allProduct')->name('all');

    Route::get('/create', 'createView')->name('create');
    Route::post('/create', 'create')->name('create');

});

Route::prefix('orders')->controller(OrderController::class)->as('orders.')->group(function () {


    Route::get('/', 'allOrder')->name('all');
 

});

