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
    <section class="content mt-5 mb-3 pt-2">
        <h2 class="text-center display-4">Productos no disponibles</h2>
        <div class="container mt-3 pt-3">
            <table class="table" id="tabla-productos">
                <thead>
                  <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nombre</th>
                    <th scope="col" class="text-center">Stock</th>
                    <th scope="col" class="text-right">Precio</th>
                  </tr>
                </thead>
                <tbody>
                @foreach($unavailables as $unavailable)
                  <tr>
                    <td>{{str_pad($unavailable->id,7,'0',STR_PAD_LEFT)}}</td>
                    <td>{{$unavailable->name}}</td>
                    <td  class="text-center">{{$unavailable->stock}}</td>
                    <td class="text-right">${{number_format($unavailable->price,2)}}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
        </div>
    </section>
    <section class="information content text-center mt-5 pt-5">
        <h2 class="text-center display-4">Estadísticas</h2>
        <div class="row mb-3 mt-5 pt-3">
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
        
    </section>
   
    
    
      
</div>
@endsection
