@extends('layouts.app')
@section('content')

<div class="container">
    <div id="divmsg" style="display:none" class="alert alert-success col-12 col-md-4 text-center fixed-bottom" role="alert">
    </div>
    <div id="diverror" style="display:none" class="alert alert-danger col-12 col-md-6 m-auto text-center fixed-bottom" role="alert">
    </div>
    <div class="card border row">
        <div class="card-header  w-100 m-0 row">
            <h1 class="text-center text-md-left col-12 col-md-8">Nueva factura</h1>
        </div>
        <div class="card-body">
            <div class="inputs px-3 row">
                <div class="field col-12 col-md-6 col-lg-4 px-3 py-1">
                    <input type="text" id="inputClient" class="form-control dataName" placeholder="Cliente">
                </div>
                <div class="field col-12 col-md-6 col-lg-4 px-3 py-1">
                    <input type="text" class="form-control dataPhone" placeholder="Teléfono">
                </div>
                <div class="field col-12 col-md-6 col-lg-4 px-3 py-1">
                    <input type="text" class="form-control dataNit" placeholder="Nit">
                </div>
                <div class="field col-12 col-md-6 col-lg-4 px-3 py-1">
                    <input type="text" class="form-control" placeholder="Vendedor" disabled value="{{Auth::user()->name}}">
                </div>
                <div class="field col-12 col-md-6 col-lg-4 px-3 py-1">
                    <input type="date" class="form-control" placeholder="Fecha">
                </div>
                <div class="field col-12 col-md-6 col-lg-4 px-3 py-1">
                    <input type="text" class="form-control" placeholder="Pago">
                </div>
            </div>
            <div class="d-flex justify-content-md-end mt-3">
                <button id="newClient" class="btn" data-toggle="modal" data-target="#client">Nuevo cliente</button>
                <button id="newProduct" class="btn">Agregar producto</button>
                <button id="print" class="btn">Imprimir</button>
            </div>

            {{-- Modal Client --}}
            <div class="modal fade" id="client" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">

                    <div class="modal-header">
                      <h4 class="modal-title " id="">Nuevo cliente</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form id="frmClient">
                        <div class="form-group">
                          <label for="name" class="col-form-label">Nombre:</label>
                          <input type="text" class="form-control  @error('name') is-invalid @enderror" name="name" id="name">
                        </div>
                        <div class="form-group">
                          <label for="nit" class="col-form-label">Nit:</label>
                          <input type="text" class="form-control  @error('nit') is-invalid @enderror" name="nit" id="nit">
                        </div>
                        <div class="form-group">
                          <label for="phone" class="col-form-label">Teléfono:</label>
                          <input type="text" class="form-control  @error('phone') is-invalid @enderror" name="phone" id="phone">
                        </div>
                        <div class="form-group">
                            <label for="email" class="col-form-label">Email:</label>
                            <input type="email" class="form-control  @error('email') is-invalid @enderror" name="email" id="email">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button type="submit" id="btnCreate" class="btn btn-primary">Crear</button>
                        </div>
                      </form>
                    </div>
                    
                  </div>
                </div>
            </div>
            {{-- end Modal Client --}}

            {{-- Modal show clients --}}

            <div class="bd-example-modal-lg hideClients modal-clients" id='modal'>
              <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title text-center" id="">Seleccione un cliente</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <div class="row col-12">
                          <i class="fas fa-search col-1 pt-2"></i>
                          <input type="search" class="form-control col-10">
                      </div>
                        <table class="table mt-5">
                          <thead>
                              <tr>
                                  <th></th>
                                  <th class="">Rut</th>
                                  <th>Nombre</th>
                                  <th>Teléfono</th>
                              </tr>
                          </thead>
                          <tbody>
                              @foreach($clients as $client)
                              <tr>
                                  <td id=""><input type="radio" class="check"></td>
                                  <td id="nit" >{{$client->nit}}</td>
                                  <td id="name">{{$client->name}}</td>
                                  <td id="phone">{{$client->phone}}</td>
                              </tr>
                              @endforeach
                          </tbody>
                        </table>
                    </div> 
                  </div>
              </div>
            </div>

            {{-- Modal show products --}}
            <div class="bd-example-modal-lg hideProducts modal-products" id=''>
              <div class="modal-dialog modal-lg">
                  <div class="modal-content w-100">
                    <div class="modal-header">
                      <h4 class="modal-title text-center" id="">Seleccione un producto</h4>
                      <button type="button" class="close-prod" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <div class="row col-12">
                          <i class="fas fa-search col-1 pt-2"></i>
                          <input type="search" class="form-control col-10">
                      </div>
                        <table class="table mt-5">
                          <thead>
                              <tr>
                                  <th></th>
                                  <th>Cantidad</th>
                                  <th>Código</th>
                                  <th>Stock</th>
                                  <th>Nombre</th>
                                  <th>Precio</th>
                                  <th>Impuesto</th>
                              </tr>
                          </thead>
                          <tbody>
                              @foreach($products as $product)
                              <tr>
                                  <td id=""><input type="checkbox" class="check-prod"></td>
                                  <td class="count"><input type="number" class="count-modal w-100" min="1"  max="{{$product->stock}}"></td>
                                  <td class="id-modal" >{{$product->id}}</td>
                                  <td class="stock-modal" >{{$product->stock}}</td>
                                  <td class="name-modal">{{$product->name}}</td>
                                  <td class="price-modal">{{$product->priceTotal}}</td>
                                  <td class="tax-modal">{{$product->tax}}</td>
                              </tr>
                              @endforeach
                          </tbody>
                        </table>
                    </div> 
                  </div>
              </div>
            </div>

            {{-- Table item --}}
            {{-- <table class="table mt-4">
              <thead>
                <tr>
                  <th>Nombre</th>
                  <th>Código</th>
                  <th>Stock</th>
                  <th>cantidad</th>
                  <th>Precio</th>
                  <th>Impuesto</th>
                  <th>Precio Total</th>
                </tr>
                <tr>
                  <td style="width:200px"><input type="text" id="txt-namProd" placeholder="Buscar producto" class="w-100 txt-namProd"></td>
                  <td></td>
                  <td></td>
                  <td style="width:200px"><input type="number" class="w-100"></td>
                  <td></td>
                  <td></td>
                </tr>
              </thead>
            </table>
 --}}
            {{-- Table items --}}
            <table class="table table-items mt-4">
              <thead>
                <tr>
                  <th>Cantidad</th>
                  <th>Código</th>
                  <th>Stock</th>
                  <th>Descripción</th>
                  <th class="text-right">Precio</th>
                  <th class="text-right">Total</th>
                </tr>
              </thead>
              <tbody class="item-data">
              </tbody>
            </table>
            <div class="cotizacion d-flex justify-content-end">
              <div class="div-total pt-5 w-50 mt-3">
                <div class="subtotal row">
                  <p style="font-size:1.2rem" class="col-8 text-center">Subtotal: </p><p style="font-size:1.2rem" class="text-right col-4 subtotal-invoice">0</p>
                </div>
                <div class="total row">
                  <p style="font-size:1.2rem" class="col-8 text-center">Total: </p><p style="font-size:1.4rem" class="text-right col-4 total-invoice">0</span></p>
                </div>
              </div>
            </div>
           
            <button type="submit" id="btn-send">Enviar</button>
        </div>
    </div>
</div>

@stop

<script src="{{ asset('js/client.js') }}" defer></script>
    <script src="{{ asset('js/detail.js') }}" defer></script>