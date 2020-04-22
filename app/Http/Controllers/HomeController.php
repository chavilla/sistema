<?php

namespace App\Http\Controllers;
use App\User;
use App\Product;
use App\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $countUsers=User::all()->count();
        $countProducts=Product::all()->count();
        $countCategories=Category::all()->count();
        return view('home', array(
            'users'=>$countUsers,
            'products'=>$countProducts,
            'categories'=>$countCategories
        ));
    }
}
