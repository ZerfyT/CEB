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
                <li class="breadcrumb-item active" aria-current="page">Customers</li>
            </ol>
        </nav>

        {{-- Heading --}}
        <h2 class="fw-bold">Customers</h2>


        {{-- Table --}}
        <div class="py-4">
            <div class="table-responsive">
                {{ $dataTable->table() }}
                {{-- <table class="table table-sm table-bordered table-hover">
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
                    <tr onclick="window.location.href='{{ route('customer-bills',$customer->id) }}'">
                        <th scope="row">{{ $customer->id }}</th>
                        <td>{{ $customer->acount_number }}</td>
                        <td>{{ $customer->name }}</td>
                        <td>{{ $customer->email }}</td>
                    </tr>
            </tbody>
        </table> --}}
            </div>
        </div>
        @push('scripts')
            {{ $dataTable->scripts() }}
        @endpush
    </div>
@endsection
