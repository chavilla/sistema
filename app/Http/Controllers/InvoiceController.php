<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Invoice;
use App\Client;
use App\Product;

class InvoiceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getAll(){
        return view('invoice.list_invoices');
    }

    public function create(){
        $clients=Client::all();
        $products=Product::all();
        return view('invoice.create', ['clients'=>$clients,'products'=>$products]);
    }
}
