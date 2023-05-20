@extends('layouts.app')

@section('sidebar')
    @include('customer.sidebar')
@endsection

@section('content')
<div class="col-md-10">
    <div class="d-flex">
        <a href="" class="btn btn-primary-link btn floating"><small>Home</small></a>
        <div class="vr"></div>
        <a href="" class="btn btn-primary-link btn floating"><small>My Account</small></a>
        <div class="vr"></div>
        <a href="" class="btn btn-primary-link btn floating"><small>Profile</small></a>
    </div>
    <div class="head-1 mt-2">
        <p class="h5">Profile</p>
        <p class="h6">My Profile Details</p>
    </div>
    <div class="container con">
        <div class="row">
            <div class="row">
                <div class="d-flex mb-4">
                    <input type="text" class="form-control me-2 w-25" role="search" id="search" placeholder="search">
                    <button type="button" class="btn btn-outline-success">Search</button>
                </div>
            </div>
            <form action="">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-outline">
                            <label for="" class="form-label">Full Name</label>
                            <input type="text" class="form-control mb-2" id="f_name" placeholder="Fullname">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-outline">
                            <label for="" class="form-label">Current password</label>
                            <input type="password" class="form-control mb-2" id="c_psw">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-outline">
                            <label for="" class="form-label">NIC</label>
                            <input type="text" class="form-control mb-2" id="nic">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-outline">
                            <label for="" class="form-label">New password</label>
                            <input type="password" class="form-control mb-2" id="n_psw">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-outline">
                            <label for="" class="form-label">E-mail</label>
                            <input type="email" class="form-control mb-2" id="mail" placeholder="example@gmail.com">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-outline">
                            <label for="" class="form-label">Confirm password</label>
                            <input type="password" class="form-control mb-2" id="con_psw">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-outline">
                            <label for="" class="form-label">Phone Number</label>
                            <input type="text" class="form-control mb-3" id="p_num">
                        </div>
                    </div>
                </div>
                <div class="button text-center">
                    <button type="submit" class="btn btn-primary w-25">SAVE</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection