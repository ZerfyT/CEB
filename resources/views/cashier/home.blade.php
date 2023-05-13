@extends('layouts.app')

@section('content')
    
        <label class="form-control" for="floatingInput">Home</label> <br>
        <h2 class="fw-bold">Home</h2>

        {{-- Cards --}}
        <div class="container-fluid">
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
                            <button onclick="window.location.href='{{ route('payment-home') }}'" class="btn btn-primary">Pay Bill</button>
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
                            <button class="btn btn-primary">View Bill</button>
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
                            <button onclick="window.location.href='{{ route('profile') }}'" class="btn btn-primary">My Profile</button>
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
                            <button onclick="window.location.href='{{ route('email-history') }}'" class="btn btn-primary">Email History</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
 
@endsection
