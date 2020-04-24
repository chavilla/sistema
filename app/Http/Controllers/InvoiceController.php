<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function getAll(){
        return view('invoice.list_invoices');
    }

    public function create(){
        return view('invoice.create');
    }
}
