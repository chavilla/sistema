@extends('layouts.app')

@section('content')

@if (session('status'))
<div id="notificacion" class=" text-white text-center notificacion pt-3 pb-3 bg-success  w-25 m-auto mt-3">
    <strong >{{ session('status') }}</strong>
</div>
@endif
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                @if(($user ?? '') && is_object($user ?? ''))
                <div style="font-size: 25px" class="card-header bg-dark text-white text-center">{{ __('Editar usuario') }}</div>
                @else
                <div style="font-size: 25px" class="card-header bg-dark text-white text-center">{{ __('Ingresar datos') }}</div>  
                @endif
                <div class="card-body">
                    <form method="POST" action="{{  isset($user) ? action('UserController@update'): action('UserController@save')}}">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name ?? '' }}" required autocomplete="name" autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-mail') }}</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email ?? '' }}" required autocomplete="email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('Usuario') }}</label>
                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{$user->username ?? '' }}" required autocomplete="username" autofocus>
                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="rol" class="col-md-4 col-form-label text-md-right">{{ __('Rol') }}</label>
                            <div class="col-md-6">
                                <select id="rol" class="form-control @error('rol') is-invalid @enderror" name="rol"  required autocomplete="rol" autofocus>
                                <option value="">Seleccionar</option>

                                @if (isset( $user->rol) &&  $user->rol=='user')
                                    <option value="{{ $user->rol ?? '' }}" selected>{{ $user->rol ?? 'Usuario' }}</option>
                                    <option value="admin">Administrador</option>
                                @elseif(isset($user) && $user->rol=='admin')
                                    <option value="user">Usuario</option>
                                    <option value="{{ $user->rol ?? '' }}" selected>{{ $user->rol ?? 'Admin' }}</option>
                                @else
                                    <option value="admin">Admin</option>
                                    <option value="user">User</option>
                                @endif
                                </select>
                                @error('rol')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                        </div>
                        
                        @if(isset($user))       
                        @else
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        @endif
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                @if(isset($user))
                                <input type="hidden" name="id" value="{{$user->id}}">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Guardar') }}
                                </button>
                                @else
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Crear') }}
                                </button>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
