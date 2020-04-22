@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Bienvenido {{ Auth::user()->name }}
                </div>
            </div>
        </div>
    </div>
    <div class="information text-center pt-5">
        <div class="row mb-3">
            <div class="col-12 col-md-4">
                <div class="card users text-white bg-primary mb-3" style="max-width: 18rem;">
                    <div class="card-header"><h2>Usuarios</h2></div>
                    <div class="card-body row">
                        <p class="col-6"><i class="fas fa-user"></i></p>
                       <p class="col-6">{{ $users ?? '' }}</p>
                    </div>
                </div>
            </div>
           
            <div class="col-12 col-md-4">
                <div class="card products text-white bg-danger mb-3" style="max-width: 18rem;">
                    <div class="card-header"><h2>Productos</h2></div>
                    <div class="card-body row">
                        <p class="col-6"><i class="fab fa-product-hunt"></i></p>
                        <p class="col-6">{{ $products }}</p>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-4">
                <div class="card categories text-white bg-success mb-3" style="max-width: 18rem;">
                    <div class="card-header"><h2>Categorías</h2></div>
                    <div class="card-body row">
                        <p class="col-6"><i class="fas fa-sitemap"></i></p>
                       <p class="col-6">{{ $categories}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
      
</div>
@endsection
