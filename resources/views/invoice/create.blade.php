@extends('layouts.app')
@section('content')

<div class="container">
    <div class="card border row">
        <div class="card-header header-card w-100 m-0 row">
            <h1 class="text-center text-md-left col-12 col-md-8">Nueva factura</h1>
        </div>
        <div class="card-body">
            <div class="inputs px-3 row">
                <div class="field col-12 col-md-6 col-lg-4 px-3 py-1">
                    <input type="text" class="form-control" placeholder="Cliente">
                </div>
                <div class="field col-12 col-md-6 col-lg-4 px-3 py-1">
                    <input type="text" class="form-control" placeholder="Teléfono">
                </div>
                <div class="field col-12 col-md-6 col-lg-4 px-3 py-1">
                    <input type="text" class="form-control" placeholder="Email">
                </div>
                <div class="field col-12 col-md-6 col-lg-4 px-3 py-1">
                    <input type="text" class="form-control" placeholder="Vendedor" disabled value="{{Auth::user()->name}}">
                </div>
                <div class="field col-12 col-md-6 col-lg-4 px-3 py-1">
                    <input type="date" class="form-control" placeholder="Fecha">
                </div>
                <div class="field col-12 col-md-6 col-lg-4 px-3 py-1">
                    <input type="text" class="form-control" placeholder="Pago">
                </div>
            </div>
        </div>
    </div>
</div>


@stop