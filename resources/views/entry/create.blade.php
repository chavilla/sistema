@extends('layouts.app')
@section('title', 'Crear entrada')
@section('content')

@if(($entry ?? '') && is_object($entry ?? ''))
<h1 class="text-center mt-3 pt-3">Editar entrada</h1>    
@else
<h1 class="text-center mt-3 pt-3">Ingresar entrada</h1>
@endif

@if(session('status'))
<div id="notificacion" class=" text-white text-center notificacion pt-3 pb-3 bg-warning  w-25 m-auto mt-3">
    <strong >{{ session('status') }}</strong>
</div>
@endif

<div class="container cont-frm mt-5">
<form action="{{ isset($entry) ? action('EntryController@update') : action('EntryController@save') }}" id="crearProducto" class="frm-crear-p row" method="post">
        {{ csrf_field() }}
        <div class="form-group col-md-6">
            <label for="count">cantidad</label>
            <input type="number" min="1" id="count" name="count" class="form-control" value="{{ $entry->cantidad ?? '' }}">
            @error('count')
            <span class="invalid-feedback d-block w-100" role="alert">
                <strong class="">Esta cantidad es incorrecta. Asegurate colocar un valor numérico</strong>
            </span>
            @enderror
        </div>
        <div class="form-group col-md-6">
            <label for="cost">Costo</label>
            <input type="number"  step="any" min=0 id="cost" name="cost" class="form-control"  value="{{ $entry->costo ?? '' }}">
            @error('cost')
            <span class="invalid-feedback d-block w-100" role="alert">
                <strong class="">Esta costo es incorrecto. Asegurate colocar un valor numérico</strong>
            </span>
            @enderror
        </div>
        <div class="form-group w-50 col-md-6">
            <label for="products">Productos</label>
            <select name="product" class="form-control" id="product">
                <option value="">Seleccionar</option>
                @foreach ($products as $item)
                    @if(($entry ?? '') && is_object($entry ?? ''))          
                        @if ($item->idproducto == $entry->id_producto )
                            <option value="{{$item->idproducto ?? ''}}" selected>{{$item->prodNombre}}</option>
                        @else
                            <option value="{{$item->idproducto ?? ''}}">{{$item->prodNombre}}</option>
                        @endif
                    @else
                    <option value="{{$item->id ?? ''}}">{{$item->name}}</option>
                    @endif
                @endforeach
            </select>
            @error('product')
            <span class="invalid-feedback d-block w-100" role="alert">
                <strong class="">Debes seleccionar un producto</strong>
            </span>
            @enderror
        </div>
        <div class="form-group d-flex justify-content-center mt-3 col-md-12 row  mx-auto ">
            <input type="submit" class="btn btn-success btn-creaProducto font-weight-bold col-12 col-md-4 col-lg-3" value="Enviar">
            @if(($entry ?? '') && is_object($entry ?? ''))
                <input type="hidden" name="id"  value="{{$entry->identrada ?? ''}}">
            @endif
        </div>
    </form>
</div>
    
@stop
