<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Invoice;
use App\Client;

class InvoiceController extends Controller
{
    public function getAll(){
        return view('invoice.list_invoices');
    }

    public function create(){
        $clients=Client::all();
        return view('invoice.create', ['clients'=>$clients]);
    }
}
