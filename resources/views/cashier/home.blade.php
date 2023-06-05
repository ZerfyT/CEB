@extends('layouts.app')

@section('sidebar')
    @include('cashier.sidebar')
@endsection

@section('content')
    <div class="container py-3">

        {{-- Breadcrumbs --}}
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('cashier.home') }}">Home</a></li>
            </ol>
        </nav>

        {{-- Heading --}}
        <h2 class="fw-bold">Home</h2>

        {{-- Cards --}}
        <div class="container py-3">
            <div class="row">
                <div class="col-6">
                    <div class="card">
                        <div class="card-header">
                            Featured
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Special title treatment</h5>
                            <p class="card-text">With supporting text below as a natural lead-in to additional
                                content.
                            </p>
                            <button onclick="window.location.href='{{ route('payment-home') }}'" class="btn btn-danger">Pay
                                Bill</button>
                        </div>
                    </div>
                </div>

                <div class="col-6">
                    <div class="card">
                        <div class="card-header">
                            Featured
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Special title treatment</h5>
                            <p class="card-text">With supporting text below as a natural lead-in to additional
                                content.
                            </p>
                            <button onclick="window.location.href='{{ route('payment-history') }}'"
                                class="btn btn-danger">Payment History</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row py-4">
                <div class="col-6">
                    <div class="card">
                        <div class="card-header">
                            Featured
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Special title treatment</h5>
                            <p class="card-text">With supporting text below as a natural lead-in to additional
                                content.
                            </p>
                            <button onclick="window.location.href='{{ route('profile') }}'" class="btn btn-danger">My
                                Profile</button>
                        </div>
                    </div>
                </div>

                <div class="col-6">
                    <div class="card">
                        <div class="card-header">
                            Featured
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Special title treatment</h5>
                            <p class="card-text">With supporting text below as a natural lead-in to additional
                                content.
                            </p>
                            <button onclick="window.location.href='{{ route('email-history') }}'"
                                class="btn btn-danger">Email History</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
