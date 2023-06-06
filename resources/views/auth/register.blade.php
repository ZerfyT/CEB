@extends('layouts.guest')

@section('content')
    <div class="container register m-4">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header h2 text-center fw-bold">{{ __('Register') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="row">
                                <label for="name" class="col-form-label">{{ __('Name:') }}</label>

                                <div class="">
                                    <input id="name" type="text"
                                        class="form-control rounded-pill @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <label for="email" class=" col-form-label">{{ __('Email Address:') }}</label>

                                <div class="">
                                    <input id="email" type="email"
                                        class="form-control rounded-pill @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <label for="password" class="col-form-label">{{ __('Password:') }}</label>

                                <div class="">
                                    <input id="password" type="password"
                                        class="form-control rounded-pill @error('password') is-invalid @enderror"
                                        name="password" required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <label for="password-confirm" class="col-form-label">{{ __('Confirm Password:') }}</label>

                                <div class="">
                                    <input id="password-confirm" type="password" class="form-control rounded-pill"
                                        name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="mt-3 text-center">
                                    <button type="submit" class="btn btn-success w-100 rounded-pill">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <img src="{{ asset('img/back-img/register.png') }}" alt="" class="img-fluid mt-5">
            </div>

        </div>
    </div>
@endsection
