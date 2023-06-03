@extends('layouts.app')

@section('sidebar')
    @include('cashier.sidebar')
@endsection

@section('content')
    @vite(['resources/sass/ebill.scss'])
    <div class="container py-3">

        @php
            $dateFormat = \Carbon\Carbon::createFromFormat('Y-m-d', $eBill->lastMeterReadingDate);
            $formattedDate = $dateFormat->format('Y-F');
        @endphp

        {{-- Breadcrumbs --}}
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('cashier.home') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('payment-home') }}">Customers</a></li>
                <li class="breadcrumb-item"><a href="{{ route('customer-bill', ['user' => $customer]) }}">Bills</a></li>
                <li class="breadcrumb-item active" aria-current="page">Bill : {{ $formattedDate }}</li>
            </ol>
        </nav>


        <div class="row">
            <div class="col-12 col-md-6">
                {{-- Heading --}}
                <h2 class="fw-bold">Electricity Bill</h2>
            </div>
            <div class="col-12 col-md-6">
                <div class="fw-bold text-secondary text-md-end">{{ $customer->name }}</div>
                <div class="fw-bold text-secondary text-md-end">Account Number : {{ $customer->account_number }}
                </div>
                <div class="text-secondary text-start text-md-end">{{ $customer->address }}</div>
            </div>
        </div>


        <div class="container bill-container p-4 my-3">
            <div class="row">
                <div class="col-12 col-md-6 mb-3 customer-info">
                    <h4>Customer Information</h4>
                    <p><span>Customer Name:</span> John Doe</p>
                    <p><span>Account Number:</span> 123456789</p>
                    <p><span>Address:</span> 123 Main St, City</p>
                    <p><span>Mobile Number:</span> 555-123-4567</p>
                    <p><span>Electricity Account Type:</span> Residential</p>
                </div>

                <div class="col-12 col-md-6 mb-3 bill-info">
                    <h4>Bill Information</h4>
                    <p><span>Bill Date:</span> June 1, 2023</p>
                    <p><span>Latest Meter Reading:</span> 100 kWh (May 1, 2023)</p>
                    <p><span>Previous Meter Reading:</span> 70 kWh (April 1, 2023)</p>
                    <p><span>Units Consumed:</span> 30 kWh</p>
                    <p><span>Fixed Charge:</span> $10</p>
                    <p><span>Total Charge for Units:</span> $300</p>
                    <p><span>Total Charge for This Month:</span> $310</p>
                    <p><span>Brought Forward:</span> $0</p>
                </div>

                <div class="charges-breakdown">
                    <h4>Charges Breakdown</h4>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Units</th>
                                <th>Price per Unit</th>
                                <th>Total Charge</th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            <tr>
                                <td>First 30 units</td>
                                <td>$10</td>
                                <td>$300</td>
                            </tr>
                            <tr>
                                <td>Next 30 units</td>
                                <td>$15</td>
                                <td>$0</td>
                            </tr>
                            <tr>
                                <td>Remaining units</td>
                                <td>$20</td>
                                <td>$0</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="d-flex flex-column align-items-end total-charge">
                    <h4>Total Charge:<span class="text-danger">$310</span></h4>
                </div>
            </div>

            {{-- Bill Details --}}
            <div class="d-flex p-5 border border-secondary bg-secondary w-75">
                <div class="row border-bottom">

                    <div class="container p-5 flex-wrap border border-secondary bg-secondary w-75">
                        <div class="row border-bottom">

                            <div class="col-6">
                                <div class="container p-5 d-flex justify-content-start py-3">
                                    <ul class="list-unstyled">
                                        <li>
                                            <h5></h5>
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

                            <div class="container py-3 d-flex justify-content-center">
                                <h3>{{ $eBill->previousMeterReadingDate }}</h3>
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
                                            <td colspan="4">{{ $eBill->lastMeterReadingDate }}</td>
                                            <td colspan="2">{{ $eBill->lastMeterReading }}</td>
                                        </tr>
                                        <tr>
                                            <td colspan="4">Previous Meter Reading</td>
                                            <td colspan="4">{{ $eBill->previousMeterReadingDate }}</td>
                                            <td colspan="3">{{ $eBill->previousMeterReading }}</td>
                                        </tr>
                                        <tr>
                                            <th colspan="8">Units</th>
                                            <th colspan="2">{{ $eBill->units }}</th>
                                        </tr>
                                        <tr>
                                            <td colspan="10"></td>
                                        </tr>
                                        <tr>
                                            <td colspan="8">Fixed Charge(Rs.)</td>
                                            <td colspan="2">{{ $eBill->getFixedCharges() }}</td>
                                        </tr>
                                        <tr>
                                            <td colspan="8">Total Charge For Units(Rs.)</td>
                                            <td colspan="2">{{ $eBill->getTotalPriceForUnits() }}</td>
                                        </tr>
                                        <tr>
                                            <td colspan="8">Total Charge For Month(Rs.)</td>
                                            <td colspan="2">{{ $eBill->getTotalPriceForMonth() }}</td>
                                        </tr>
                                        <tr>
                                            <td colspan="8">Brought Forwared Balance(Rs.)</td>
                                            <td colspan="2">{{ $eBill->forwardBalance }}</td>
                                        </tr>
                                        <tr>
                                            <th colspan="8">Total Amount</th>
                                            <th colspan="2"><span
                                                    class="border-bottom border-danger">{{ $eBill->getTotalPrice() }}</span>
                                            </th>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            {{-- Pay Button --}}
                            <div class="container d-flex justify-content-center">
                                <button onclick="window.location.href='{{ route('paybill') }}'" class="btn btn-danger"> Pay
                                    Now</button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
