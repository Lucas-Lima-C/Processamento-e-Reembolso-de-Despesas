@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="width:70%; position:relative; left:110px;" >
                <div class="card-header">{{ __('FUNCIONÁRIO') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="wrap-input100 validate-input" data-validate = "Valid email is   required: ex@abc.xyz">
                            <input class="input100" type="text" name="email" placeholder="Email" id="email" type="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="fa fa-envelope" aria-hidden="true"></i>
                            </span>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="wrap-input100 validate-input" data-validate = "Password is required">
                            <input class="input100" type="password" placeholder="Senha" id="password" name="password" required autocomplete="current-password">
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="fa fa-lock" aria-hidden="true"></i>
                            </span>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check" style="position:relative; right:150px;">
                                    <input class="form-check-input" style="position:relative; left:15px;" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Lembre-se de mim') }}
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="container-login100-form-btn" style="position:relative; right:80px;">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="login100-form-btn">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" style="position:relative; left:40px;"  href="{{ route('password.request') }}">
                                        {{ __('Esqueceu sua senha?') }}
                                    </a>
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
