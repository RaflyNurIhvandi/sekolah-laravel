@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-5">
                <div class="card">
                    <div class="card-header bg-primary text-light">
                        <h4 class="text-center mt-1 mb-0">Reset Password</h4>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('password.email') }}" class="login-form p-4 p-md-5">
                            @csrf

                            <div class="form-group">
                                <label for="email" class="mb-2">{{ __('Email Address') }}</label>
                                <input id="email" type="email"
                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-groub mt-4">
                                <button type="submit" class="btn btn-primary" style="width: 100%;">
                                    {{ __('Send Password Reset Link') }}
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
    </div>
@endsection
