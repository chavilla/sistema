<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Invoice;
use App\Detail;
/* use App\User; */

class PdfController extends Controller
{
    public function PDF($id){
        $invoice=Invoice::find($id);
        $detail=Detail::where('invoice_id','=',$id)->get();
        $pdf=\PDF::loadView('prueba',array(
            'invoice'=>$invoice,
            'detail'=>$detail
        ));

        return $pdf->stream('pdf-factura.pdf');
    }
}
