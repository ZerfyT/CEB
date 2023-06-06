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
                <li class="breadcrumb-item active" aria-current="page">Recent Payments</li>
            </ol>
        </nav>

        {{-- Heading --}}
        <h2 class="fw-bold">Recent Payments</h2>

        {{-- Table --}}
        <div class="py-4">
            <div class="table-responsive">
                {{ $dataTable->table() }}
            </div>
        </div>

        @push('scripts')
            {{ $dataTable->scripts() }}
        @endpush
        {{-- <div class="container py-4">
        <table class="table table-sm table-bordered table-hover" id="paymentTable">
            <thead class="bg-secondary">
              <tr class="">
                <th class="col-2">Payment Id</th>
                <th class="col-2">Bill Id</th>
                <th class="col-2">Date</th>
                <th class="col-2">Amount</th>
                <th class="col-2">Paid Amount</th>
                <th class="col-2">Balance</th>
              </tr>
            </thead>
            <tbody class="table-light">
              @foreach ($payments as $payment)
                  <tr>
                      <th scope="row">{{ $payment->id }}</th>
                      <td>{{ $payment->bill_id }}</td>
                      <td>{{ $payment->date }}</td>
                      <td>{{ $payment->amount }}</td>
                      <td>{{ $payment->paid_amount }}</td>
                      <td>{{ $payment->balance }}</td>
                  </tr>
                   @endforeach
            </tbody>
          </table>
    </div> --}}
    </div>
@endsection
