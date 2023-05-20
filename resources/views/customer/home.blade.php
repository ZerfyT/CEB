@extends('layouts.app')

@section('sidebar')
@include('customer.sidebar')
@endsection

@section('content')
<div class="container-fluid">
    <div class="col-md-10">
        <a href="" class="btn btn-primary-link"><small>Home</small></a>
        <div class="head-1 mt-2">
            <p class="h5">Dashboard</p>
            <p class="h6 mb-4">Welcome to your E-bill online portal</p>
        </div>
        <div class="container con">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="card mb-4" style="width: 25rem;">
                        <div class="card-body">
                            <div class="card-header mb-2 fw-bold h6">Latest E-bill</div>
                            <div class="card-text mb-3">View your latest Electricity Bill</div>
                            <a href="" class="btn btn-primary w-25">View</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="card mb-4" style="width: 25rem;">
                        <div class="card-body">
                            <div class="card-header mb-2 fw-bold h6">Latest E-bill</div>
                            <div class="card-text mb-3">View your latest Electricity Bill</div>
                            <a href="" class="btn btn-primary w-25">View</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="card mb-4" style="width: 25rem;">
                        <div class="card-body">
                            <div class="card-header mb-2 fw-bold h6">Latest E-bill</div>
                            <div class="card-text mb-3">View your latest Electricity Bill</div>
                            <a href="" class="btn btn-primary w-25">View</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="card mb-4" style="width: 25rem;">
                        <div class="card-body">
                            <div class="card-header mb-2 fw-bold h6">Latest E-bill</div>
                            <div class="card-text mb-3">View your latest Electricity Bill</div>
                            <a href="" class="btn btn-primary w-25">View</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection