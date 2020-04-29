<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Invoice;
use App\Client;
use App\Product;
use App\Detail;

class InvoiceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getAll(){
        $invoices=Invoice::all();
        return view('invoice.list_invoices',['invoices'=>$invoices]);
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
        $invoice->fecha=date('Y-m-d');
        $invoice->total=$request->datos['total'];
        $invoice->save();

        $size=sizeof($request->datos['names']);
        for ($i=0; $i <$size; $i++) { 
            $detail=new Detail();
            $detail->invoice_id=$invoice->id;
            $detail->product_id=$request->datos['codes'][$i];
            $detail->counts=$request->datos['counts'][$i];
            $detail->prices=$request->datos['prices'][$i];
            $detail->save();
            /* Disminuir un producto */
            $product=Product::find($request->datos['codes'][$i]);
            $stock=floatVal($product->stock-$request->datos['counts'][$i]);
            $product->stock=$stock;
            $product->save();
        }
        
        return response()->json([
            'message'=>'Factura insertada',
            'usuario'=>$invoice->user_id,
            'nit'=>$invoice->client_id,
            'phone'=>$client->total
            ]);
    }

    public function delete($id){
        $invoice=Invoice::find($id)->delete();
        return redirect()->action('InvoiceController@getAll')
            ->with('status', 'Factura Eliminada'); 

    }
}
