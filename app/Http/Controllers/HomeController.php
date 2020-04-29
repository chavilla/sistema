<?php

namespace App\Http\Controllers;
use App\User;
use App\Product;
use App\Category;
use App\Client;
use App\Invoice;
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
     *now
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $day=date("Y-m-d");
        $countUsers=User::all()->count();
        $countClients=Client::all()->count();
        $countProducts=Product::all()->count();
        $countCategories=Category::all()->count();
        $sales=Invoice::where('fecha',$day)->get()->sum('total');
        return view('home', array(
            'users'=>$countUsers,
            'products'=>$countProducts,
            'categories'=>$countCategories,
            'clients'=>$countClients,
            'sales'=>$sales
        ));
    }
}
