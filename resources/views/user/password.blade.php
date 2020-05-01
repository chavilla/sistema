@extends('layouts.app')
@section('content')

<h1 class="text-center mt-3">Cambiar contraseña</h1>
@if(session('updated'))
<div class="alert text-center alert-success w-25 m-auto py-3">{{ session('updated')}}</div> 
@endif
@if(session('status'))
<div class="alert text-center alert-danger w-25 m-auto py-3">{{ session('status')}}</div>
@endif

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
               
                <div class="card-body">
                    <form method="POST" action="{{route('update_password')}}">
                        {{ csrf_field() }}
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña actual:') }}</label>
                            <div class="col-md-6">
                                <input id="password_old" type="password" class="form-control @error('password_old') is-invalid @enderror" name="password_old" value="" required autocomplete="password_old" autofocus>
                                @error('password_old')
                                <span class="invalid-feedback" role="alert">
                                    <strong>La contraseña debe tener mínimo 8 caracteres</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña nueva:') }}</label>
                            <div class="col-md-6">
                                <input id="password_new" type="password" class="form-control @error('password_new') is-invalid @enderror" name="password_new" value="" required autocomplete="password_new" autofocus>
                                @error('password_new')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>La contraseña debe tener mínimo 8 caracteres</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary btn-block">
                                    {{ __('Guardar') }}
                                </button>
                              
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@stop