@extends('layouts.app')

@section('sidebar')
    @include('mreader.sidebar')
@endsection

@section('content')
    <div class="container py-3">

        {{-- Breadcrumbs --}}
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('mreader.home') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Customers</li>
            </ol>
        </nav>

        {{-- Heading --}}
        <h2 class="fw-bold">Registed Customers</h2>


        <div class="container d-flex justify-content-between align-items-end">
            {{-- Register New Customer --}}
            <div class="add-customer">
                <button class="btn btn-outline-success rounded" type="button" data-bs-toggle="modal"
                    data-bs-target="#modelNewCustomer">
                    data-bs-target="#modelNewCustomer">
                    <i class="bi bi-plus-lg mx-1"></i>New Customer
                </button>
            </div>
        </div>

        {{-- Table --}}
        <div class="py-4">
            <div class="table-responsive">
                {{ $dataTable->table() }}
                {{-- <table id="users-table" class="table table-bordered table-hover">
                <thead class="bg-secondary">
                    <tr class="">
                        <th class="col-1">ID</th>
                        <th class="col-3">Name</th>
                        <th class="col-2">Account No</th>
                        <th class="col-2">Acc. Type</th>
                        <th class="col-3">Address</th>
                        <th class="col-3">Mobile Number</th>
                        <th class="col-3">Mobile Number</th>
                        <th class="col-1">Status</th>
                        <th class="col-3">Actions</th>
                        <th class="col-3">Actions</th>
                    </tr>
                </thead>
                <tbody class="table-light">

                    @foreach ($users as $user)
                        <tr onclick="window.location.href=''">
                            <th scope="row">{{ $user->id }}</th>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->account_number }}</td>
                            <td>{{ $user->account_type }}</td>
                            <td>{{ $user->address }}</td>
                            <td>{{ $user->phone }}</td>
                            <td>
                                <button type="button" class="btn btn-sm btn-outline-danger" data-toggle="tooltip">Add Readings</button>
                            </td>
                            <td>{{ $user->phone }}</td>
                            <td>
                                <button type="button" class="btn btn-sm btn-outline-danger" data-toggle="tooltip">Add Readings</button>
                            </td>
                            <td class="text-center">
                                @if ($user->is_active)
                                    <i class="bi bi-check-circle-fill text-success fs-5"></i>
                                @else
                                    <i class="bi bi-x-circle-fill text-danger fs-5">
                                @endif
                            </td>
                        </tr>
                    @endforeach


                </tbody>
            </table> --}}
            </div>
        </div>

        @push('scripts')
            {{ $dataTable->scripts() }}
        @endpush

        {{-- Model - Register New Customer --}}
        @include('components.modal_register_new_customer')

        {{-- Model - Add Meter Reading --}}
        @include('components.modal_add_reading')
    @endsection
