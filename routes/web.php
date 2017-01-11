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

Route::get('/v1/categories', 'CategoryController@getAllCategories');
Route::post('/v1/categories', 'CategoryController@saveCategory');
Route::get('/v1/categories/{id}', 'CategoryController@getCategory');
Route::get('/v1/categories/{id}/products', 'CategoryController@getProductsByCategory');

Route::get('/v1/products', 'ProductController@getAllProducts');
Route::post('/v1/products', 'ProductController@saveProduct');
Route::get('/v1/products/{id}', 'ProductController@getProduct');
