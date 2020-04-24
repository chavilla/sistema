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
                        <th>Fecha</th>
                        <th>Cliente</th>
                        <th>Vendedor</th>
                        <th>Estado</th>
                        <th>Total</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
</div>
   

@stop