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
                <li class="breadcrumb-item"><a href="{{ route('payment-home') }}">Customers</a></li>
                <li class="breadcrumb-item active" aria-current="page">Bills</li>
            </ol>
        </nav>


        <div class="row">
            <div class="col-12 col-md-6">
                {{-- Heading --}}
                <h2 class="fw-bold">Customer Bills</h2>
            </div>
            <div class="col-12 col-md-6">
                <div class="fw-bold text-secondary text-md-end">{{ $user->name }}</div>
                <div class="fw-bold text-secondary text-md-end">Account Number : {{ $user->account_number }}
                </div>
                <div class="text-secondary text-start text-md-end">{{ $user->address }}</div>
            </div>
        </div>

        {{-- Table --}}
        <div class="py-4">
            <div class="table-responsive">
                {{ $dataTable->table() }}
            </div>
        </div>

        @push('scripts')
            {{ $dataTable->scripts() }}
        @endpush
    </div>
@endsection
