@extends('layouts.app')

@section('sidebar')
    @include('cashier.sidebar')
@endsection

@section('content')
    <label class="form-control" for="floatingInput">Payment</label> <br>
    <h2 class="fw-bold">Customer Bills</h2>

    {{-- Table --}}
    <div class="container py-4">
        {!! $dataTable->table() !!}

    </div>
    @push('scripts')
    {!! $dataTable->scripts() !!}
@endpush
@endsection
