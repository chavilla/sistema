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

Auth::routes();
//User
Route::post('/register', 'UserController@save')->name('register');
Route::get('/list', 'UserController@getAll')->name('list_user');
Route::get('/create', 'UserController@create')->name('create_user');
Route::get('/edit/{id}', 'UserController@edit')->name('edit_user');
Route::get('/delete/{id}', 'UserController@delete')->name('delete_user');
Route::post('/update', 'UserController@update')->name('update_user');
Route::post('/save', 'UserController@save')->name('save_user');
Route::get('/api_user', 'UserController@getApi')->name('api_user');

//Categories products
Route::get('/list-categories', 'CategoryController@getAll')->name('list_categories');
Route::get('/create-category', 'CategoryController@create')->name('create_category');
Route::get('/edit-category/{id}', 'CategoryController@edit')->name('edit_category');
Route::get('/delete-category/{id}', 'CategoryController@delete')->name('delete_category');
Route::post('/update-category', 'CategoryController@update')->name('update_category');
Route::post('/save-category', 'CategoryController@save')->name('save_category');

//Products
Route::get('/list-products', 'ProductController@getAll')->name('list_products');
Route::get('/create-product', 'ProductController@create')->name('create_product');
Route::get('/edit-product/{id}', 'ProductController@edit')->name('edit_product');
Route::get('/delete-product/{id}', 'ProductController@delete')->name('delete_product');
Route::post('/update-product', 'ProductController@update')->name('update_product');
Route::post('/save-product', 'ProductController@save')->name('save_product');

/* Index */
Route::get('/', 'HomeController@index');
