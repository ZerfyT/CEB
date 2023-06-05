@extends('layouts.app')


@section('sidebar')
    @include('customer.sidebar')
@endsection

@section('content')
    {{-- Breadcrumbs --}}
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('customer.home') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Bill Details</li>
        </ol>
    </nav>


    @include('components.bill-modal-component')

    {{-- Table --}}
    <div class="container py-4 table-responsive">
        {{ $dataTable->table() }}


        @push('scripts')
            {{ $dataTable->scripts() }}
        @endpush
        {{-- @foreach ($bills as $bill)
            <x-bill-modal-component :bill="$bill" />
        @endforeach --}}
        <script src="{{ asset('js/app.js') }}"></script>

    </div>
@endsection
