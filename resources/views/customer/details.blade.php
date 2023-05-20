@extends('layouts.app')

<head>
    <title>Bill details view</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">

</head>

@section('content')
<div class="col-md-10">
    <div class="d-flex">
        <a href="" class="btn btn-primary-link btn floating"><small>Home</small></a>
        <div class="vr"></div>
        <a href="" class="btn btn-primary-link btn floating"><small>My Account</small></a>
        <div class="vr"></div>
        <a href="" class="btn btn-primary-link btn floating"><small>Nov-22</small></a>
    </div>
    <div class="head-1 mt-2">
        <p class="h5">My Account</p>
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
                    <a href="" class="btn btn-primary-link btn floating fw-bold">22</a>
                    <div class="vr"></div>
                    <a href="" class="btn btn-primary-link btn floating fw-bold">November</a>
                    <div class="vr"></div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="table-responsive-sm">
                    <table class="table border border-secondary mt-3">
                        <tbody>
                            <tr>
                                <td colspan="2">Days</td>
                                <td>30</td>
                            </tr>
                            <tr>
                                <td>Last Meter Reading</td>
                                <td>2022-Nov-5</td>
                                <td>1500</td>
                            </tr>
                            <tr>
                                <td>Previous Meter Reading</td>
                                <td>2022-Oct-6</td>
                                <td>1400</td>
                            </tr>
                            <tr>
                                <td colspan="2">Units</td>
                                <td>100</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-6">
                <div class="table-responsive-sm">
                    <table class="table border border-secondary mt-3">
                        <tbody>
                            <tr>
                                <td colspan="2">Fixed Charge(Rs.)</td>
                                <td>1500.00</td>
                            </tr>
                            <tr>
                                <td colspan="2">Total Charge for Units(Rs.)</td>
                                <td>3500.00</td>
                            </tr>
                            <tr>
                                <td colspan="2">Total Charge for Months(Rs.)</td>
                                <td>5000.00</td>
                            </tr>
                            <tr>
                                <td colspan="2">Brought Forward Balance(Rs.)</td>
                                <td>60.00</td>
                            </tr>
                            <tr>
                                <td colspan="2" class="fw-bold">Total Amount(Rs.)</td>
                                <td class="fw-bold">5060.00</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection