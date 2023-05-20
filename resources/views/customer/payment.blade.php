@extends('layouts.app')


@section('sidebar')
@include('customer.sidebar')
@endsection

@section('content')
<div class="row">
    <div class="col-md-10">
        <div class="d-flex">
            <a href="" class="btn btn-primary-link btn floating"><small>Home</small></a>
            <div class="vr"></div>
            <a href="" class="btn btn-primary-link btn floating"><small>My Account</small></a>
            <div class="vr"></div>
            <a href="" class="btn btn-primary-link btn floating"><small>Payment History</small></a>
        </div>
        <div class="head-1 mt-2">
            <p class="h5">Payment History</p>
            <p class="h6">Welcome to your E-bill online portal</p>
        </div>
        <div class="container con">
            <div class="head-2 d-flex justify-content-between">
                <div class="state">
                    <p class="h5">Electricity Account Statement</p>
                </div>
                <div class="cus_add">
                    <div class="h6">K James Edward</div>
                    <div class="h6">No 18, Main road</div>
                    <div class="h6">Colombo</div>
                </div>
            </div>
            <p class="h5">7646883783</p>
            <div class="small">Domestic (11)</div>
            <hr class="hr">
            <div class="row">
                <div class="row">
                    <div class="d-flex">
                        <input type="text" class="form-control me-2 w-25" role="search" id="search" placeholder="search">
                        <button type="button" class="btn btn-outline-success">Search</button>
                    </div>
                </div>
                <div class="col-12">
                    <div class="table-responsive-md">
                        <table class="table table-bordered mt-3">
                            <thead>
                                <tr>
                                    <th scope="col">Date</th>
                                    <th scope="col">Type</th>
                                    <th scope="col">Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>2022/Octomber/20</td>
                                    <td>CDM</td>
                                    <td>4235.00</td>
                                </tr>
                                <tr>
                                    <td>2022/Octomber/20</td>
                                    <td>CDM</td>
                                    <td>4235.00</td>
                                </tr>
                                <tr>
                                    <td>2022/Octomber/20</td>
                                    <td>CDM</td>
                                    <td>4235.00</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection