@extends('layouts.app')
@section('title')
@section('content')

<h1 class="text-center mt-3">Categorías para los productos</h1>
@if(session('status'))
    <div id="notificacion" class="notify">
        <strong class="">{{session('status')}}</strong>
    </div>  
@endif  
<div class="container mt-5">
<a href="{{route('create_category')}}" class="btn btn-primary col-4 col-md-3 col-lg-2 btn-crea mb-5 p-2">Crear</a>
<table class="table table-borderless table-responsive-md" id="tabla-contactos">
    <thead class="thead-dark p-2">
        <th>Id Categoria</th>
        <th>Nombre</th>
        <th class="text-center">Acción</th>
    </thead>
    <tbody>
        @foreach($categories as $category)
        <tr>
            <td>{{ $category->id }}</td>
            <td>{{ $category->name }}</td>
            <td class="text-center">
                <a href="{{action('CategoryController@edit',['id'=>$category->id])}}" class="btn btn-editar"><i class="fas fa-edit text-info"></i></a>
                <a href="{{action('CategoryController@delete',['id'=>$category->id])}}" class="btn btn-eliminar"><i class="fas fa-trash-alt text-danger"></i></a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>
@stop