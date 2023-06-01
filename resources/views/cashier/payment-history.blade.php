@extends('layouts.app')

@section('sidebar')
    @include('cashier.sidebar')
@endsection

@section('content')
    <label class="form-control" for="floatingInput">Payment</label> <br>
    <h2 class="fw-bold">Payment</h2>

    {{-- Search --}}
    <div class="col-3">
        <div class="container">
            <label for="AccountNo" class="rounded mb-1">Account No</label>
            <div class="input-group">
                <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search"
                    aria-describedby="search-addon" />
                <button type="button" class="btn btn-outline-success">search</button>
            </div>
        </div>
    </div>
    
    {{-- Table --}}
    <div class="container py-4">
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
    </div>
@endsection
