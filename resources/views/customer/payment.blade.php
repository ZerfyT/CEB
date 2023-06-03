@extends('layouts.app')


@section('sidebar')
@include('customer.sidebar')
@endsection

@section('content')
<label class="form-control" for="floatingInput">Payments</label> <br>
    <h2 class="fw-bold">Payment History</h2>


    {{-- Table --}}
    <div class="container py-4">
        {{ $dataTable->table() }}

        
        @push('scripts')
            {{ $dataTable->scripts() }}
        @endpush
    </div>
@endsection