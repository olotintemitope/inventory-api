<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/products/add', 'ProductController@showItemPage')
    ->name('add_product');

Route::get('/products/view', 'ProductController@listProducts')
    ->name('list_products');

Route::get('/products/search', 'ProductController@searchProduct')
    ->name('search_products');

Route::post('/create/item', 'ProductController@addItem');
