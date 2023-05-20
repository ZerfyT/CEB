@extends('layouts.guest')

@section('content')
<div class="container login-wrap">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header h2">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row form-outline mb-3 mt-3">
                            <label for="email" class=" col-form-label">{{ __('Email Address:') }}</label>
                            <div class="">
                                <input id="email" type="email" class="form-control rounded-pill @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="example@gmail.com">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>


                        <div class="row form-outline mb-3">
                            <label for="password" class="col-form-label">{{ __('Password:') }}</label>

                            <div class="">
                                <input id="password" type="password" class="form-control rounded-pill @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-4 mt-3">
                            <div class="d-flex justify-content-between">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} />
                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                                <div class="link">
                                    @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary w-100">
                                    {{ __('Login') }}
                                </button>
                            </div>
                        </div>
                        <div class="icon text-center mt-3">
                            <button type="button" class="btn btn-outline-primary btn-floating me-3"><i class="bi bi-google"></i></button>
                            <button type="button" class="btn btn-outline-primary btn-floating me-3"><i class="bi bi-facebook"></i></button>
                            <button type="button" class="btn btn-outline-primary btn-floating"><i class="bi bi-apple"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <img src="{{ asset('img/login.png') }}" alt="" class="img-fluid">
        </div>
    </div>
</div>
@endsection