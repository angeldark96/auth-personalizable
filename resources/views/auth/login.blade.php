@extends('layouts.app')
@section ('content')
    <div class="row justify-content-center">
        <div class="col-sm-4 ">
        <div class="card mt-5">
            <div class="card-header text-center">
                Acceso de Sesion
            </div>
            <div class="card-body">
                <form method="post" action="{{ route('login') }}" novalidate>
                    @csrf
                    <div class="form-group">
                        <label for="">Usuario</label>
                        <input
                                type="email"
                                name="email"
                                class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                value="{{ old('email') }}"
                                placeholder="Ingresa tu email">
                        @if ($errors->has('email'))
                            <span class="invalid-feedback">
                                            <strong>{{ $errors->first('email') }}</strong>
                             </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" name="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"  placeholder="Ingresa tu password">
                        @if ($errors->has('password'))
                            <span class="invalid-feedback">
                                            <strong>{{ $errors->first('password') }}</strong>
                             </span>
                        @endif
                    </div>
                    <button class="btn btn-primary btn-block">Acceder</button>
                </form>
            </div>
        </div>
    </div>
    </div>
@stop