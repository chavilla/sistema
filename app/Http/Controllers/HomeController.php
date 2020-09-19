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
        // get total of all categories
        $day=date("Y-m-d");
        $countUsers=User::all()->count();
        $countClients=Client::all()->count();
        $countProducts=Product::all()->count();
        $countCategories=Category::all()->count();
        $sales=Invoice::where('fecha',$day)->get()->sum('total');

        /* Show the products with 0 stock */
        $unavailables=Product::where('stock','=',0)->get();

        /*--get sales of the current month----*/
        $carbon = new \Carbon\Carbon();
        $startMonth=$carbon->now()->startOfMonth()->format('Y-m-d');
        $endMonth=$carbon->now()->lastOfMonth()->format('Y-m-d');
        $salesThisMonth=Invoice::whereBetween('fecha', [$startMonth, $endMonth])->sum('total');

        return view('home', array(
            'users'=>$countUsers,
            'products'=>$countProducts,
            'categories'=>$countCategories,
            'clients'=>$countClients,
            'sales'=>$sales,
            'unavailables'=>$unavailables,
            'salesThisMonth'=>$salesThisMonth
        ));
    }
}
