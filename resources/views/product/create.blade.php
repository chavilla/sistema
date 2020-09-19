@extends('layouts.app')
@section('content')

@if(($product ?? '') && is_object($product ?? ''))
    <h1 class="text-center">Editar producto</h1>
@else
    <h1 class="text-center">Crear producto</h1>
@endif

@if (session('status'))
    <div id="notificacion" class=" text-white text-center notificacion pt-3 pb-3 bg-warning  w-25 m-auto mt-3">
        <strong >{{ session('status') }}</strong>
    </div>
@endif
<div class="container">
<form action="{{  isset($product) ? action('ProductController@update'): action('ProductController@save')}}" id="crearProducto" class="frm-crear-p row mt-5" method="post">
    {{ csrf_field() }}
        <div class="form-group col-md-6">
            <label for="name">Nombre</label>
        <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ $product->name ?? '' }}">
        </div>

        <div class="form-group col-md-6">
            <label for="price">Precio</label>
            <input type="number"  step="any" min=0 id="price" name="price" id="price" class="form-control  @error('price') is-invalid @enderror" value="{{ $product->price ?? '' }}">
        </div>
      
        <div class="form-group col-md-6">
            <label for="tax">Impuesto</label>
            <input type="number" value=0  step="any" min=0 id="tax" name="tax" id="tax" class="form-control @error('tax') is-invalid @enderror" value="{{ $product->tax ?? ''}}">
        </div>       

        <div class="form-group w-50 col-md-6">
            <label for="inventory">Inventariable</label>
            <select name="inventory" id="inventory" class="form-control 
            @error('inventory') is-invalid @enderror" value="{{ $product->inventory ?? '' }}">
                <option value="">Seleccionar</option>
                @if($product->inventory ?? '')
                <option value="{{ $product->inventory ?? ''}}" selected>{{ $product->inventory ?? ''}}</option>
                <option value="no">No</option>     
                @else
                <option value="{{ $product->inventory ?? ''}}" selected>{{ $product->inventory ?? ''}}</option>
                <option value="si">Si</option>
                @endif
               
            </select>
        </div>

        <div class="form-group w-50 col-md-6">
            <label for="category">Categoría</label>
            <select name="category" class="form-control @error('category') is-invalid @enderror" id="category" value="{{ $product->category_id ?? '' }}">
                <option value="">Seleccionar</option>
                @foreach($categories as $category)
                    @if(($product->category_id ?? '' && $product->category->id==$category->id))
                        <option class="pt-1 pb-1" value="{{$category->id ?? ''}}" selected>{{$category->name ?? ''}}</option>
                    @else
                        <option value="{{$category->id ?? ''}}">{{ $category->name ?? '' }}</option>  
                    @endif
                @endforeach 
            </select>
        </div>

        <div class="form-group col-md-6">
            <label for="reference">Referencia</label>
            <input type="text"  name="reference" id="reference"  class="form-control  @error('reference') is-invalid @enderror" value="{{ $product->reference ?? '' }}">
        </div>

        <div class="form-group col-md-6">
            <label for="reference">Stock</label>
            <input type="number"  name="stock" id="stock"  class="form-control  @error('stock') is-invalid @enderror" value="{{ $product->stock ?? 0 }}">
        </div>

        <div class="form-group col-md-12">
            <label for="description">Descripción <small>(opcional)</small></label>
            <textarea name="description" id="description" cols="20" rows="5" class="form-control" value="{{ $product->description ?? '' }}"></textarea>
        </div>
        <div class="form-group d-flex justify-content-center mt-3 row mx-auto  col-md-12">
            @if(isset($product))
                <input type="hidden" name="id" value="{{$product->id ?? ''}}">
            @endif
            <input type="submit" class="btn btn-success btn-creaProducto col-12 col-md-4 col-lg-3  font-weight-bold" value="Enviar">
        </div>
    </form>
</div>

@stop