@extends('layouts.app')

@section('sidebar')
    @include('mreader.sidebar')
@endsection

@section('content')
    <div class="container py-3">

        {{-- Breadcrumbs --}}
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('mreader.home') }}">Home</a></li>
            </ol>
        </nav>

        {{-- Heading --}}
        <h2 class="fw-bold">Dashboard</h2>

        {{-- Cards --}}
        <div class="container py-3">
            <div class="col">
                <div class="row">

                    <!-- Customers Card -->
                    <div class="col-xxl-4 col-md-6">
                        <div class="card sales-card">

                            <div class="card-body">
                                <h5 class="card-title">Customers <span>| Total</span></h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-people"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>145</h6>
                                        {{-- <span class="text-success small pt-1 fw-bold">12%</span> --}}
                                        {{-- <span class="text-muted small pt-2 ps-1">increase</span> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Readings Card -->
                    <div class="col-xxl-4 col-md-6">
                        <div class="card revenue-card">

                            <div class="card-body">
                                <h5 class="card-title">Readings <span>| This Month</span></h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-pencil-square"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>24</h6>
                                        <span class="text-success small pt-1 fw-bold">8%</span>
                                        <span class="text-muted small pt-2 ps-1">completed</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Readings All Card -->
                    <div class="col-xxl-4 col-xl-12">
                        <div class="card customers-card">
                            <div class="card-body">
                                <h5 class="card-title fw-bold">Readings <span>| Total</span></h5>
                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-pencil-square"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>1244</h6>
                                        <span class="text-danger small pt-1 fw-bold">12%</span> <span
                                            class="text-muted small pt-2 ps-1"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
