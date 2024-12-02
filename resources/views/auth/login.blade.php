@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="card">
                    <div class="card-header bg-primary text-light">
                        <h3 class="text-center mt-1 mb-0">Sign In</h3>
                    </div>
                    <h3 class="text-center mt-4 mb-0" style="font-family: sans-serif;">Anda memiliki akun?</h3>
                    <form method="POST" action="{{ route('login') }}" class="login-form p-4 p-md-5">
                        @csrf
                        <div class="form-group">
                            <label for="email" class="mb-2">{{ __('Email Address') }}</label>
                            <input id="email" type="email" style="width:100%;"
                                class="form-control @error('email') is-invalid @enderror" name="email"
                                value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password" class="mb-2 mt-3">{{ __('Password') }}</label>
                            <input id="password" type="password" style="width:100%;"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="current-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group d-md-flex mt-3 mb-2">
                            <div class="w-50">
                                <input type="checkbox" name="remember" id="remember"
                                    {{ old('remember') ? 'checked' : '' }}>
                                <label class="checkbox-wrap checkbox-primary">Remember Me</span></label>
                            </div>
                        </div>
                        <div class="form-group mt-4">
                            <button type="submit" class="btn btn-primary" style="width: 100%;">
                                {{ __('Login') }}
                            </button>
                        </div>
                        <div class="text-center mt-5">
                            @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                            @if (Route::has('register'))
                                <a class="btn btn-link" href="{{ route('register') }}">{{ __("Do you want to sign up?") }}</a>
                            @endif
                        </div>
                        <div class="text-center mt-3">
                            <a href="/" class="btn btn-link">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
