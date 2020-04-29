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
/* Index */
Route::get('/', 'HomeController@index');

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
Route::post('/get-product', 'ProductController@getProduct')->name('get_product');


//Entries
Route::get('/list-entries', 'EntryController@getAll')->name('list_entries');
Route::get('/create-entry', 'EntryController@create')->name('create_entry');
Route::get('/edit-entry/{id}', 'EntryController@edit')->name('edit_entry');
Route::get('/delete-entry/{id}', 'EntryController@delete')->name('delete_entry');
Route::post('/update-entry', 'EntryController@update')->name('update_entry');
Route::post('/save-entry', 'EntryController@save')->name('save_entry');

//Invoices
Route::get('/list-invoices', 'InvoiceController@getAll')->name('list_invoices');
Route::get('/create-invoice', 'InvoiceController@create')->name('create_invoice');
Route::post('/save-invoice', 'InvoiceController@save')->name('save_invoice');
Route::get('/delete-invoice/{id}', 'InvoiceController@delete')->name('delete_invoice');

//Clients
Route::get('/list-clients', 'ClientController@getAll')->name('list_clients');
Route::post('/create-client', 'ClientController@create')->name('create_client');
Route::get('/edit-client/{id}', 'ClientController@edit')->name('edit_client');
Route::post('/update-client', 'ClientController@update')->name('update_client');
Route::get('/delete-client/{id}', 'ClientController@delete')->name('delete_client');