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
                <li class="breadcrumb-item active" aria-current="page">MeterReadings</li>
            </ol>
        </nav>

        {{-- Heading --}}
        <h2 class="fw-bold">Meter Readings</h2>


        <div class="container d-flex justify-content-between align-items-end">
            {{-- Search Button --}}
            <div class="search">
                <form method="GET" action="{{ route('mreader.search', ['page' => 'mReadings']) }}">
                    @csrf
                    <label for="AccountNo" class="rounded mb-1">Account No</label>
                    <div class="input-group">
                        <input type="search" name="searchKey" class="form-control rounded" placeholder="Search"
                            aria-label="Search" aria-describedby="search-addon" />
                        <button type="submit" class="btn btn-outline-success">Search</button>
                    </div>
                </form>
            </div>

            {{-- Add Meter Reading (Manual) --}}
            <div class="add-customer">
                <button class="btn btn-outline-success rounded" type="button" data-bs-toggle="modal"
                    data-bs-target="#modelMeterReading">
                    <i class="bi bi-plus-lg mx-1"></i>New Reading
                </button>
            </div>
        </div>

        {{-- Table --}}
        <div class="container py-4">
            <table class="table table-sm table-bordered table-hover">
                <thead class="bg-secondary">
                    <tr class="">
                        <th class="col">ID</th>
                        <th class="col">Address</th>
                        <th class="col">Name</th>
                        <th class="col">Account No</th>
                        <th class="col">Meter Reading</th>
                        <th class="col">Date</th>
                        {{-- <th class="col-2">Status</th> --}}
                    </tr>
                </thead>
                <tbody class="table-light">
                    @foreach ($mReadings as $mReading)
                        <tr onclick="window.location.href=''">
                            <th scope="row">{{ $mReading->id }}</th>
                            <td>{{ $mReading->address }}</td>
                            <td>{{ $mReading->name }}</td>
                            <td>{{ $mReading->account_number }}</td>
                            <td>{{ $mReading->meter_reading }}</td>
                            <td>{{ $mReading->date }}</td>
                            {{-- <td class="text-center">
                                <i class="bi bi-check-circle-fill text-success fs-5"></i>
                            </td> --}}
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- Model - Add Meter Reading --}}
        <div class="modal fade" id="modelMeterReading" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="AddMeterReadingLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="AddMeterReadingLabel">Add Meter Reading</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="{{ route('mreader.addMReading') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="accNo" class="col-form-label">Account No:</label>
                                <input type="number" class="form-control" id="accNo" name="accNo">
                            </div>
                            <div class="mb-3">
                                <label for="date" class="col-form-label">Date:</label>
                                <input type="date" class="form-control" id="date" name="date">
                            </div>
                            <div class="mb-3">
                                <label for="reading" class="col-form-label">Reading:</label>
                                <input type="number" class="form-control" id="reading" name="reading">
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-outline-success" name="submit">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        {{-- @error('error')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
        @enderror --}}

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
    @endsection
