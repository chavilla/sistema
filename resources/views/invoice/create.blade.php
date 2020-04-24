@extends('layouts.app')
@section('content')

<div class="container">
    <div id="divmsg" style="display:none" class="alert alert-success col-12 col-md-4 text-center fixed-bottom" role="alert">
    </div>
    <div id="diverror" style="display:none" class="alert alert-danger col-12 col-md-4 text-center fixed-bottom" role="alert">
    </div>
    <div class="card border row">
        <div class="card-header header-card w-100 m-0 row">
            <h1 class="text-center text-md-left col-12 col-md-8">Nueva factura</h1>
        </div>
        <div class="card-body">
            <div class="inputs px-3 row">
                <div class="field col-12 col-md-6 col-lg-4 px-3 py-1">
                    <input type="text" class="form-control" placeholder="Cliente">
                </div>
                <div class="field col-12 col-md-6 col-lg-4 px-3 py-1">
                    <input type="text" class="form-control" placeholder="Teléfono">
                </div>
                <div class="field col-12 col-md-6 col-lg-4 px-3 py-1">
                    <input type="text" class="form-control" placeholder="Email">
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
        </div>
    </div>
</div>

@stop
