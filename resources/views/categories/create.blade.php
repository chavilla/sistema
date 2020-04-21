@extends('layouts.app')
@section('title')
@section('content')

@if(($category ?? '') && is_object($category ?? ''))
<h1 class="text-center mt-3">Editar categoría</h1>
@else
<h1 class="text-center mt-3 pt-3">Crear nueva categoría</h1>
@endif

<div class="container">
    <form action="{{isset($category) ? action('CategoryController@update'): action('CategoryController@save')}}" class="frm-crear mt-5 mb-3" method="POST">
        {{ csrf_field() }}
        <div class="form-group d-flex justify-content-center flex-row">
            <input type="text" name="name" class="form-control col-md-6 @error('name') is-invalid @enderror" placeholder="Nombre" value="{{$category->name ?? ''}}">
        </div>
        <div class="error w-25 m-auto text-center">
            @error('name')
            <span class="invalid-feedback d-block w-100" role="alert">
                <strong class="">Esta categoría es incorrecta o ya existe</strong>
            </span>
            @enderror
        </div>
        <div class="d-flex justify-content-center pt-5">
            <input type="submit" class="btn btn-success col-12 col-md-3 font-weight-bold " value="Enviar">
            @if(isset($category))
        <input type="hidden" name="id" value="{{$category->id}}">
            @endif      
        </div>
    </form>
    @if(session('status'))
    <div id="notificacion" class="text-white text-center notificacion pt-3 pb-3 bg-warning  w-25 m-auto mt-3">
        <strong class="mt-3">{{ session('status') }}</strong>
    </div>    
    @endif
</div>
@stop