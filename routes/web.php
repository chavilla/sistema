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

/* 
use App\Entry;
use App\Product; */

/* Route::get('/test', function () {
    
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