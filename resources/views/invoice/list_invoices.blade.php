@extends('layouts.app')
@section('content')

<div class="container">
    <div class="card border row">
        <div class="card-header header-card w-100 m-0 row">
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
                        <th>Usuario</th>
                        <th>Cliente</th>
                        <th>Total</th>
                        <th>Fecha</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($invoices as $invoice)
                    <tr>
                        <td>{{$invoice->id}}</td>
                        <td>{{$invoice->user_id}}</td>
                        <td>{{$invoice->client_id}}</td>
                        <td>{{$invoice->total}}</td>
                        <td>{{$invoice->created_at}}</td>
                    </tr>     
                    @endforeach
                   
                </tbody>
            </table>
        </div>
    </div>
</div>
   

@stop