@extends('layouts.app')
@section('content')

<div class="container">
    @if (session('status'))
    <div id="notificacion" class="text-center pt-3 pb-3  alert alert-success   w-25 m-auto mt-3">
        <strong >{{ session('status') }}</strong>
    </div>
    @endif
    <div class="card border row">
        <div class="card-header  w-100 m-0 row">
            <h1 class="text-center text-md-left col-12 col-md-8">Facturas</h1>
            <div class=" col-12 col-md-4 d-block enlace d-flex justify-content-center mt-4 mt-md-0">
            <a href="{{route('create_invoice')}}" class="btn btn-info w-100  w-md-50 text-white d-flex justify-content-center align-items-center">Nueva factura</a>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-responsive-md">
                <thead>
                    <tr>
                        <th>Factura No.</th>
                        <th>Vendedor</th>
                        <th>Cliente</th>
                        <th>Pago</th>
                        <th class="text-center">Total</th>
                        <th class="text-center">Fecha</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($invoices as $invoice)
                    <tr>
                        <td>{{str_pad($invoice->id,7,'0',STR_PAD_LEFT)}}</td>
                        <td>{{$invoice->user->name}}</td>
                        <td>{{$invoice->client->name}}</td>
                        <td>{{$invoice->pay}}</td>
                        <td class="text-right">${{number_format($invoice->total,2)}}</td>
                        <td class="text-center">{{$invoice->fecha}}</td>
                        {{-- <td><a href="{{route('delete_invoice',['id'=>$invoice->id])}}"><i class="fas fa-trash-alt text-danger"></i></a></td> --}}
                    </tr>     
                    @endforeach
                   
                </tbody>
            </table>
        </div>
    </div>
</div>
   

@stop