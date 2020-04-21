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

Route::get('/', 'HomeController@index')->name('/');

//User
Route::post('/register', 'UserController@save')->name('register');
Route::get('/list', 'UserController@getAll')->name('list_user');
Route::get('/create', 'UserController@create')->name('create_user');
Route::get('/edit/{id}', 'UserController@edit')->name('edit_user');
Route::get('/delete/{id}', 'UserController@delete')->name('delete_user');
Route::post('/update', 'UserController@update')->name('update_user');
Route::post('/save', 'UserController@save')->name('save_user');

//Categories products
Route::get('/list-categories', 'CategoryController@getAll')->name('list_categories');
Route::get('/create-category', 'CategoryController@create')->name('create_category');
Route::get('/edit-category/{id}', 'CategoryController@edit')->name('edit_category');
Route::get('/delete-category/{id}', 'CategoryController@delete')->name('delete_category');
Route::post('/update-category', 'CategoryController@update')->name('update_category');
Route::post('/save-category', 'CategoryController@save')->name('save_category');







/* use App\Entry;
use App\Product;

Route::get('/test', function () {
    
    $entries=Entry::all();
    foreach ($entries as $entry) {
        echo "Datos";
       echo $entry->id. "   " ;
       echo $entry->products->name. "   ";
       echo $entry->count. "   ";
       echo $entry->cost."   ";
       echo $entry->created."   ";
       echo $entry->user->name;
       echo "<br>";
    }

    echo "</br></br>";
    $products=Product::all();

    foreach ($products as $product) {
        echo $product->name. "   " ;
        echo $product->priceTotal. "   " ;
        echo $product->categories->name;
    }



    die();
    return view('test');
}); */