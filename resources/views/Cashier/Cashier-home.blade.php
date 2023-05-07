@extends('layouts.app')


@section('content')
    <div class="container-fluid d-flex" style="height:100vh">
        <div class="row">
            <div class="col-2 mh-100" style="background-color:#E3E3E3">

                <div class="container d-flex justify-content-center py-5" style="background-color:#D9D9D9">
                    <i class="bi bi-person-circle">Username</i>
                </div>

                <div class="container px-0">
                    <ul class="list-group" >
                        <button class="w-100 list-group-item border-0 p-3" id="butn">Home</button>
                        <button class="w-100 list-group-item border-0 p-3" id="butn">Pay</button>
                        <button class="w-100 list-group-item border-0 p-3" id="butn">View Account Bill</button>
                        <button class="w-100 list-group-item border-0 p-3" id="butn">My Profile</button>
                        <button class="w-100 list-group-item border-0 p-3" id="butn">Email History</button>
                    </ul>
                </div>
            </div>


            <div class="col-10">
                <div class="container py-3">
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
                                        <a href="#" class="btn btn-primary">Go somewhere</a>
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
                                        <a href="#" class="btn btn-primary">Go somewhere</a>
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
                                        <a href="#" class="btn btn-primary">Go somewhere</a>
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
                                        <a href="#" class="btn btn-primary">Go somewhere</a>
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
