@extends('layouts.app')
@section('content')

@if (session('status'))
<div id="notificacion" class="text-center pt-3 pb-3  alert alert-success   w-25 m-auto mt-3">
    <strong >{{ session('status') }}</strong>
</div>
@endif
<h1 class="text-center mt-5 font-weight display-5">Clientes</h1>
<div class="container mt-5" id="cont-tabla">
    <table class="table table-borderless" id="tabla-contactos">
        <thead class="thead-dark p-2">
            <th>Nombre</th>
            <th>Teléfono</th>
            <th>Email</th>
            <th class="text-center">Acción</th>
        </thead>
        <tbody>
            @foreach($clients as $client)
            <tr>
                <td>{{$client->name}}</td>
                <td>{{$client->phone}}</td>
                <td>{{$client->email}}</td>
                <td class="text-center">
                <a href="{{route('edit_client',['id'=>$client->id])}}" class="mr-3"><i class="fas fa-edit text-info"></i></a>
                
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>


@stop