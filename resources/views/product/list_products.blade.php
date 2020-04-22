@extends('layouts.app')
@section('title', 'lista productos')
@section('content')
<h1 class="text-center mt-5 font-weight display-4">Lista de productos</h1>
@if (session('status'))
    <div id="notificacion" class=" text-white text-center notificacion pt-3 pb-3 bg-success  w-25 m-auto mt-3">
        <strong >{{ session('status') }}</strong>
    </div>
@endif
<div id="cont-tabla" class="pl-5 pr-5 mt-5 cont-tabla">
<a href="{{ action('ProductController@create')}}" class="btn btn-primary btn-crea mb-5 p-1">Crear producto</a>
    <table class="table table-productos  table-responsive-md" id="tabla-poductos">
        <thead class="thead-dark p-2">
            <th>Id</th>
            <th>Nombre</th>
            <th>Categoria</th>
            <th>Cantidad</th>
            <th>Precio</th>
            <th>Impuesto</th>
            <th>Precio Total</th>
            <th>Acción</th>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr>
            <td>{{$product->id}}</td>
                <td>{{$product->name}}</td>
                <td>{{$product->category_id}}</td>
                <td>{{$product->count}}</td>
                <td>{{$product->price}}</td>
                <td>{{$product->tax}}</td>
                <td>{{$product->priceTotal}}</td>
                <td class=""> 
                <a href="{{action('ProductController@edit',['id'=>$product->id])}}" class="btn btn-editar"><i class="fas fa-edit text-info"></i></a>
                <a href="{{action('ProductController@delete',['id'=>$product->id])}}" class="btn btn-eliminar"><i class="fas fa-trash-alt text-danger"></i></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@stop