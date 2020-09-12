@extends('layouts.app')
@section('title', 'Lista de entradas')  
@section('content')
<h1 class="text-center mt-5 font-weight display-4">Lista de entradas</h1>

@if (session('status'))
<div id="notificacion" class="text-center pt-3 pb-3  alert alert-success   w-25 m-auto mt-3">
    <strong >{{ session('status') }}</strong>
</div>
@endif
<div id="cont-tabla" class="pl-5 pr-5 mt-5 cont-tabla">
<a href="{{action('EntryController@create')}}" class="btn btn-primary btn-crea mb-5 p-1">Nueva entrada</a>
    <table class="table table  table-borderless" id="tabla-entradas">
        <thead class="thead-dark p-2">
            <th>Id Entrada</th>
            <th>Producto</th>
            <th class="text-center">Cantidad</th>
            <th class="text-right">Costo</th>
            <th class="text-right">Usuario</th>
            <th class="text-center">Fecha</th>
            <th>Acciones</th>
        </thead>
        <tbody>
           @foreach($entries as $entry)
           <tr>
            <td>{{$entry->id}}</td>
            <td>{{$entry->product->name}}</td>
            <td class="text-center">{{$entry->count}}</td>
            <td class="text-right">${{ number_format($entry->cost,2)}}</td>
            <td class="text-right">{{$entry->user->name ?? ''}}</td>
            <td class="text-center">{{$entry->created_at}}</td>
            <td>
                <a href="{{action('EntryController@delete', ['id'=>$entry->id])}}" class="btn btn-eliminar"><i class="fas fa-trash-alt text-danger"></i></a>
            </td>     
        </tr> 
           @endforeach
        </tbody>
    </table>
    <div class="page">{{ $entries->links() }}</div>
</div>
@stop