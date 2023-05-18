@extends('layouts.app')

@section('sidebar')
    @include('cashier.sidebar')
@endsection

@section('content')
    <div class="container mb-4">
        <label class="form-control" for="floatingInput">Pay Bill</label> <br>
        <h2 class="fw-bold">Pay Bill</h2>
    </div>

    <div class="container w-50 bg-secondary p-4">
        <div class="container p-3 d-flex justify-content-center border-bottom border-dark">
            <h4>Payment Details </h4>
        </div>

        <div class="container mt-5 py-3">
            <table class="table">
                <tbody>
                    <tr>
                        <th>Account No</th>
                        <td class="text-end">400442104</td>
                    </tr>
                    <tr>
                        <th>Customer Name</th>
                        <td class="text-end">James Edwards</td>
                    </tr>
                    <tr>
                        <th>Date</th>
                        <td class="text-end">2023/11/12</td>
                    </tr>
                </tbody>
            </table>

            <table class="table table-bordered border-white mt-5">
                <tbody>
                    <tr>
                        <th>Total Amount(Rs.)</th>
                        <td class="text-end">4000.00</td>
                    </tr>
                    <tr>
                        <th class="align-middle">Given Amount(Rs.)</th>
                        <td class="text-end">5000.00</td>
                    </tr>
                    <tr>
                        <th class="">Remaining Amount(Rs.)</th>
                        <td class="text-end align-middle">1000.00</td>
                    </tr>
                </tbody>
            </table>
        </div>

        {{-- Pay Button --}}
        <div class="container d-flex justify-content-center">
            <button class="btn btn-danger" onclick="window.location.href=" >Send Via Email</button>
        </div>
    </div>
@endsection