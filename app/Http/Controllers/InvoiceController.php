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

    public function save(Request $request){

        $client=Client::where('nit','=',$request->datos['client'])->first();
        $invoice=new Invoice();
        $invoice->user_id=\Auth::user()->id;
        $invoice->client_id=$client->id;
        $invoice->total=$request->datos['total'];
        $invoice->save();

        return response()->json([
            'message'=>'Factura insertada',
            'usuario'=>$invoice->user_id,
            'nit'=>$invoice->client_id,
            'phone'=>$client->total
            ]);
            

        die();
    }
}
