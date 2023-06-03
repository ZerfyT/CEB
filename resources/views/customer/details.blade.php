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

@include('components.bill_modal')
    {{-- Table --}}
    <div class="container py-4">
        {{ $dataTable->table() }}

        
        @push('scripts')
            {{ $dataTable->scripts() }}
        @endpush
    </div>
@endsection