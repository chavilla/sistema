@extends('layouts.app')
@section('content')

@if (session('status'))
<div id="notificacion" class=" text-white text-center pt-3 pb-3 bg-success  w-25 m-auto mt-3">
    <strong >{{ session('status') }}</strong>
</div>
@endif
<h1 class="text-center mt-5 font-weight display-5">Usuarios registrados</h1>
<div class="container  mt-5" id="cont-tabla">
    <table class="table table-borderless" id="tabla-contactos">
        <thead class="thead-dark p-2">
            <th>Nombre</th>
            <th>Usuario</th>
            <th>Rol</th>
            <th class="text-center">Acción</th>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td class="">{{$user->rol}}</td>
                <td class="text-center">
                <a href="{{route('edit_user',['id'=>$user->id])}}" class="mr-3"><i class="fas fa-edit text-info"></i></a>
                @if($user->rol!=='admin')
                <a href="{{route('delete_user',['id'=>$user->id])}}"><i class="fas fa-trash-alt text-danger"></i></a>
                @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>


@stop