@extends('layouts.app')

@section('sidebar')
    @include('cashier.sidebar')
@endsection

@section('content')
    @vite(['resources/sass/ebill.scss'])
    <div class="container py-3">

        @php
            $dateFormat = \Carbon\Carbon::createFromFormat('Y-m-d', $bill->new_reading_date);
            $formattedDate = $dateFormat->format('Y-F-d');
        @endphp

        {{-- Breadcrumbs --}}
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('cashier.home') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('payment-home') }}">Customers</a></li>
                <li class="breadcrumb-item"><a href="{{ route('customer-bills', compact('user')) }}">Bills</a></li>
                <li class="breadcrumb-item active" aria-current="page">Bill : {{ $formattedDate }}</li>
            </ol>
        </nav>


        <div class="row">
            <div class="col-12 col-md-6">
                {{-- Heading --}}
                <h2 class="fw-bold">Electricity Bill</h2>
            </div>
            <div class="col-12 col-md-6">
                <div class="fw-bold text-secondary text-md-end">{{ $user->name }}</div>
                <div class="fw-bold text-secondary text-md-end">Account Number : {{ $user->account_number }}
                </div>
                <div class="text-secondary text-start text-md-end">{{ $user->address }}</div>
            </div>
        </div>


        <div id="pdf-content" class="container bill-container p-4 my-3">
            <div class="row g-5">

                <div class="col-12 col-md-6 mb-3 customer-info">
                    <h4>Customer Information</h4>
                    <div>
                        <p><span>Customer Name:</span></p>
                        <p>{{ $user->name }}</p>
                    </div>
                    <div>
                        <p><span>Address:</span></p>
                        <p>{{ $user->address }}</p>
                    </div>
                    <div>
                        <p><span>Mobile Number:</span></p>
                        <p>{{ $user->phone }}</p>
                    </div>
                    <div>
                        <p><span>Account Number:</span></p>
                        <p>{{ $user->account_number }}</p>
                    </div>
                    <div>
                        <p><span>Electricity Account Type:</span></p>
                        <p>{{ $user->account_type }}</p>
                    </div>
                </div>

                <div class="col-12 col-md-6 mb-3 payment-section">
                    <div class="d-flex flex-column align-items-center align-items-md-start total-charge">
                        <h4>Total Charge: </h4>
                        <div class="mt-3">
                            <span class="lkr">LKR </span>
                            <span class="text-danger fs-3 fw-bold">{{ $bill->charge_total }}</span>
                        </div>

                        <form class="row g-3" action="{{ route('paybill') }}" method="post">
                            @csrf
                            {{-- <div class="csubmit3"> --}}
                            {{-- <label for="payAmount" class="form-label">Amount</label> --}}
                            {{-- </div> --}}
                            <input type="hidden" name="billId" value="{{ $bill->id }}">
                            <div class="col-12 col-lg-auto">
                                <input class="form-control px-3 py-2" type="number" name="payAmount" id="payAmount"
                                    placeholder="Amount LKR." required>
                            </div>
                            <div class="col-12 col-lg-auto">
                                <button type="submit" class="btn btn-danger rounded fw-bold w-100 px-3 py-2">Pay
                                    Now</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-md-6 mb-3 bill-info">
                    <h4>Bill Information</h4>
                    <div>
                        <p><span>Bill Date:</span></p>
                        <p>{{ $formattedDate }}</p>
                    </div>
                    <div>
                        <p><span>Latest Meter Reading:</span></p>
                        <p>{{ $bill->new_reading }}</p>
                    </div>
                    <div>
                        <p><span>Previous Meter Reading:</span></p>
                        <p>{{ $bill->old_reading }}</p>
                    </div>
                    <div>
                        <p><span>Units Consumed <span class="lkr">kWh</span>:</span></p>
                        <p>{{ $bill->units }}</p>
                    </div>
                    <div>
                        <p><span>Fixed Charge <span class="lkr">LKR</span>:</span></p>
                        <p>{{ $bill->charge_fixed }}</p>
                    </div>
                    <div>
                        <p><span>Total Charge for Units <span class="lkr">LKR</span>:</span></p>
                        <p>{{ $bill->charge_for_units }}</p>
                    </div>
                    <div>
                        <p><span>Total Charge for This Month <span class="lkr">LKR</span>:</span></p>
                        <p>{{ $bill->charge_for_month }}</p>
                    </div>
                    <div>
                        <p><span>Brought Forward Balance <span class="lkr">LKR</span>:</span></p>
                        <p>{{ $bill->balance_forward }}</p>
                    </div>
                    <div id="last-payment">
                        <p><span>Last Payment <span class="lkr">LKR</span>:</span></p>
                        <p>{{ $bill->last_payment }}</p>
                    </div>
                    <div id="total-charge" class="border-top border-2">
                        <p><span>Total <span class="lkr">LKR</span>:</span></p>
                        <p>{{ $bill->charge_total }}</p>
                    </div>
                </div>

                <div class="col-12 col-md-6 mb-3 charges-breakdown">
                    <h4>Charges Breakdown</h4>
                    <table class="table text-center">
                        <thead>
                            <tr>
                                <th>Units <span class="lkr">kWh</span></th>
                                <th>Price per Unit <span class="lkr">LKR</span></th>
                                <th>Total Charge <span class="lkr">LKR</span></th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            <tr>
                                <td>0 - 30</td>
                                <td>20.0</td>
                                <td>{{ $bill->range_one_cost }}</td>
                            </tr>
                            <tr>
                                <td>30 - 60</td>
                                <td>35.0</td>
                                <td>{{ $bill->range_two_cost }}</td>
                            </tr>
                            <tr>
                                <td>60 ></td>
                                <td>40.0</td>
                                <td>{{ $bill->range_three_cost }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <span style="display: none;"></span>
    </div>
@endsection
