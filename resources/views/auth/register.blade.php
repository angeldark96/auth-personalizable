@extends('layouts.app')
@section ('content')
    <div class="row justify-content-center">
        <div class="col-sm-4 ">
            <div class="card mt-5">
                <div class="card-header text-center">
                   Registrar Usuario
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('register.store') }}" novalidate>
                        @csrf
                        <div class="form-group">
                            <label for="">Name</label>
                            <input
                                    name="name"
                                    class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                    value="{{ old('name') }}"
                                   >
                            @if ($errors->has('name'))
                                <span class="invalid-feedback">
                                            <strong>{{ $errors->first('name') }}</strong>
                             </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input
                                    type="email"
                                    name="email"
                                    class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                    value="{{ old('email') }}"
                                  >
                            @if ($errors->has('email'))
                                <span class="invalid-feedback">
                                            <strong>{{ $errors->first('email') }}</strong>
                             </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="password" name="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}">
                            @if ($errors->has('password'))
                                <span class="invalid-feedback">
                                  <strong>{{ $errors->first('password') }}</strong>
                             </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="">Confirm Password</label>
                            <input
                                    type="password"
                                    name="password_confirmation"
                                    class="form-control"
                                   >
                        </div>
                        <button class="btn btn-primary btn-block">Registrarse</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


@stop