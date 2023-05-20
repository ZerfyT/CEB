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
        <table class="table table-sm table-bordered table-hover">
            <thead class="bg-secondary">
                <tr class="">
                    <th class="col-1">ID</th>
                    <th class="col-3">Account No</th>
                    <th class="col-3">Name</th>
                    <th class="col-3">Email Address</th>
                </tr>
                
            </thead>
            <tbody class="table-light">
                @foreach ($customers as $customer)
                    <tr onclick="window.location.href='{{ route('customer-bill',$customer->id) }}'">
                        <th scope="row">{{ $customer->id }}</th>
                        <td>{{ $customer->acount_number }}</td>
                        <td>{{ $customer->name }}</td>
                        <td>{{ $customer->email }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
