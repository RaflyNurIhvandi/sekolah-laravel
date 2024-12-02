@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-6">
                <div class="card">
                    <div class="card-header bg-primary text-light">
                        <h3 class="text-center mt-1 mb-0">Sign Up</h3>
                    </div>
                    <h3 class="text-center mt-4 mb-0" style="font-family: sans-serif;">Masukan Nama, Email dan Password</h3>
                    <form method="POST" action="{{ route('register') }}" class="login-form p-4 p-md-5">
                        @csrf
                        <div class="form-group">
                            <label for="name" class="mb-2">{{ __('Name') }}</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email" class="mb-2 mt-3">{{ __('Email Address') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password" class="mb-2 mt-3">{{ __('Password') }}</label>
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="new-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="confirm-password" class="mb-2 mt-3">{{ __('Confirm Password') }}</label>
                            <input id="password-confirm" type="password" class="form-control"
                                name="password_confirmation" required autocomplete="new-password">
                        </div>
                        <div class="form-group mt-5">
                            <button type="submit" class="btn btn-primary" style="width: 100%;">
                                {{ __('Register') }}
                            </button>
                        </div>
                        <div class="text-center mt-4">
                            @if (Route::has('login'))
                                <a class="btn-link" href="{{ route('login') }}">{{ __('Login?') }}</a>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
