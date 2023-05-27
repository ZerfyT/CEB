@extends('layouts.app')

@section('sidebar')
    @include('cashier.sidebar')
@endsection

@section('content')
    <div class="container mb-4">
        <label class="form-control" for="floatingInput">Electricity Bill</label> <br>
        <h2 class="fw-bold">Electricity Bill</h2>
    </div>
        <div class="container p-5 flex-wrap border border-secondary bg-secondary w-75">
            <div class="row border-bottom">

    <div class="container p-5 flex-wrap border border-secondary bg-secondary w-75">
        <div class="row border-bottom">

            <div class="col-6">
                <div class="container p-5 d-flex justify-content-start py-3">
                    <ul class="list-unstyled">
                        <li>
                            <h5>{{ $billDetails->id }}</h5>
                        </li>
                        <li class="">Domestic</li>
                    </ul>

                </div>
            </div>

            <div class="col-6">
                <div class="container">
                    <div class="container d-flex justify-content-end">
                        <ul class="list-unstyled">
                            <li>
                                <h5>{{ $customer->id }}</h5>
                            </li>
                            <li class=""></li>
                        </ul>

                    </div>
                </div>

                <div class="col-6">
                    <div class="container">
                        <div class="container d-flex justify-content-end">
                            <ul class="list-unstyled">
                                <li>{{ $customer->name }}</li>
                                <li>{{ $customer->address }}</li>
                                <li>{{ $customer->date }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>


            {{-- Bill --}}
            @foreach ($customer->bills as $bill)

                <div class="container py-3 d-flex justify-content-center">
                    <h3>2023 November</h3>
                </div>

                <div class="container px-5">
                    <table class="table table-borderless">

                        <tbody>
                            <tr>
                                <td colspan="8">{{ $bill->id }}</td>
                                <td colspan="2">30</td>
                            </tr>
                            <tr>
                                <td colspan="4">Last Meter Reading</td>
                                <td colspan="4">2023/11/1</td>
                                <td colspan="2">1100</td>
                            </tr>
                            <tr>
                                <td colspan="4">Previous Meter Reading</td>
                                <td colspan="4">2023/10/1</td>
                                <td colspan="3">1000</td>
                            </tr>
                            <tr>
                                <th colspan="8">Units</th>
                                <th colspan="2">100</th>
                            </tr>
                            <tr>
                                <td colspan="10"></td>
                            </tr>
                            <tr>
                                <td colspan="8">Fixed Charge(Rs.)</td>
                                <td colspan="2">1500.00</td>
                            </tr>
                            <tr>
                                <td colspan="8">Total Charge For Units(Rs.)</td>
                                <td colspan="2">3000.00</td>
                            </tr>
                            <tr>
                                <td colspan="8">Total Charge For Month(Rs.)</td>
                                <td colspan="2">4500.00</td>
                            </tr>
                            <tr>
                                <td colspan="8">Brought Forwared Balance(Rs.)</td>
                                <td colspan="2">60.00</td>
                            </tr>
                            <tr>
                                <th colspan="8">Total Amount</th>
                                <th colspan="2"><span class="border-bottom border-danger">4560.00</span></th>
                            </tr>
                        </tbody>
                    </table>
                </div>

                {{-- Pay Button --}}
                <div class="container d-flex justify-content-center">
                    <button onclick="window.location.href='{{ route('paybill') }}'" class="btn btn-danger"> Pay Now</button>
                </div>

        </div>
    @endforeach
@endsection
