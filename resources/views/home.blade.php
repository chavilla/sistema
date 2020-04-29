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
                <div class="card  text-white sales bg-primary mb-3" style="max-width: 18rem;">
                    <div class="card-header"><h2>Ventas de hoy hasta ahora</h2></div>
                    <div class="card-body">
                        <p class=" text-center sales-txt">${{ $sales}}</p>
                    </div>
                </div>
            </div>
           
            <div class="col-12 col-md-4">
                <div class="card products text-white bg-danger mb-3" style="max-width: 18rem;">
                    <div class="card-header"><h2>Productos registrados</h2></div>
                    <div class="card-body row">
                        <p class="col-6"><i class="fab fa-product-hunt"></i></p>
                        <p class="col-6">{{ $products }}</p>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-4">
                <div class="card clients text-white bg-success mb-3" style="max-width: 18rem;">
                    <div class="card-header"><h2>Clientes registrados</h2></div>
                    <div class="card-body row">
                        <p class="col-6"><i class="fab fa-creative-commons-by"></i></p>
                       <p class="col-6">{{ $clients}}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row pt-2">
            <div class="col-12 col-md-4">
                <div class="card categories text-white bg-purple mb-3" style="max-width: 18rem;">
                    <div class="card-header"><h2>Categorías registradas</h2></div>
                    <div class="card-body row">
                        <p class="col-6"><i class="fas fa-sitemap"></i></p>
                       <p class="col-6">{{ $categories}}</p>
                    </div>
                </div>
            </div>

            <div class="col-sm-12 col-md-4">
                <div class="card users text-white bg-orange mb-3" style="max-width: 18rem;">
                    <div class="card-header"><h2>Usuarios registrados</h2></div>
                    <div class="card-body row">
                        <p class="col-6"><i class="fas fa-user"></i></p>
                       <p class="col-6">{{ $users ?? '' }}</p>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
      
</div>
@endsection
