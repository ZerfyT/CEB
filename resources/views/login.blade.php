@extends('layouts.app')

@include('layouts.header')

<head>
    <title>LOGIN</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" 
integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">

</head>

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="row mb-3">
                <h2>LOGIN PAGE</h2>
            </div>
            <div class="form-outline mb-3">
                <label for="" class="form-label">Username</label>
                <input type="text" class="form-control rounded-pill" placeholder="example@gmail.com">
            </div>
            <div class="form-outline mb-3">
                <label for="" class="form-label">Password</label>
                <input type="password" class="form-control rounded-pill" placeholder="">
            </div>
            <div class="row mb-4 mt-3">
                <div class="d-flex justify-content-between">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" value="" id="check1" checked />
                        <label class="form-check-label" for="form2Example31"> Remember me </label>
                    </div>
                    <div class="link">
                        <a href="#!">Forgot password?</a>
                    </div>
                </div>
            </div>
            <button type="button" class="btn btn-primary w-100 rounded-pill">Sign In</button>
            <div class="icon text-center mt-3">
                <button type="button" class="btn btn-outline-primary btn-floating me-3"><i class="fa-brands fa-google"></i></button>
                <button type="button" class="btn btn-outline-primary btn-floating me-3"><i class="fa-brands fa-facebook"></i></button>
                <button type="button" class="btn btn-outline-primary btn-floating"><i class="fa-brands fa-apple"></i></button>
            </div>
        </div>
        <div class="col-md-8">
            <img src="{{ asset('resources/images/login.png') }}" alt="" class="img-fluid">
        </div>
    </div>
</div>

<script src="https://kit.fontawesome.com/88503f0b5b.js" crossorigin="anonymous"></script>


@endsection