@extends('layouts.app')
@section('title', 'lista productos')
@section('content')
<h1 class="text-center mt-5 font-weight display-4">Lista de productos</h1>
@if (session('status'))
    <div id="notificacion" class="text-center pt-3 pb-3  alert alert-success   w-25 m-auto mt-3">
        <strong >{{ session('status') }}</strong>
    </div>
@endif

<div id="cont-tabla" class="pl-5 pr-5 mt-5 cont-tabla">

    <table class="table table-productos table-responsive-md" id="tabla-productos">
        
        <a href="{{ action('ProductController@create')}}" class="btn btn-primary btn-crea mb-2 p-2">Crear producto</a>
        <input type="search" id="search" class="form-control col-md-4 my-2" placeholder="Buscar producto">
        <thead class="thead-dark p-2">
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th class="text-left">Categoria</th>
                <th class="text-right">Stock</th>
                <th class="text-right">Precio</th>
                <th class="text-right">Impuesto</th>
                <th class="text-right">Precio Total</th>
                <th class="text-center">Acción</th>
            </tr> 
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr class="fila">
                <td>{{str_pad($product->id,7,'0',STR_PAD_LEFT)}}</td>
                <td>{{$product->name}}</td>
                <td class="text-left">{{$product->categories->name}}</td>
                <td class="text-right">{{$product->stock}}</td>
                <td class="text-right">${{number_format($product->price,2)}}</td>
                <td class="text-right">{{$product->tax}}%</td>
                <td class="text-right">${{number_format($product->priceTotal,2)}}</td>
                <td class="text-center"> 
                <a href="{{action('ProductController@edit',['id'=>$product->id])}}" class="btn btn-editar"><i class="fas fa-edit text-info"></i></a>
                <a href="{{action('ProductController@delete',['id'=>$product->id])}}" class="btn btn-eliminar"><i class="fas fa-trash-alt text-danger"></i></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="page">{{ $products->links() }}</div>
</div>

@stop
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js"></script>
<script src="{{asset('js/product.js')}}"></script>