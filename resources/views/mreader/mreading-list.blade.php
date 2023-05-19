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
                <label for="AccountNo" class="rounded mb-1">Account No</label>
                <div class="input-group">
                    <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search"
                        aria-describedby="search-addon" />
                    <button type="button" class="btn btn-outline-success">Search</button>
                </div>
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
                        <th class="col-1">ID</th>
                        <th class="col-3">Account No</th>
                        <th class="col-3">Date</th>
                        <th class="col-3">Meter Reading</th>
                        <th class="col-2">Status</th>
                    </tr>
                </thead>
                <tbody class="table-light">
                    <tr onclick="window.location.href=''">
                        <th scope="row">1</th>
                        <td>456222467</td>
                        <td>2023 / 2 / 10</td>
                        <td>23566</td>
                        <td class="text-center"><i class="bi bi-check-circle-fill text-success fs-5"></i></td>
                    </tr>
                    <tr onclick="window.location.href=''">
                        <th scope="row">2</th>
                        <td>456222468</td>
                        <td>2023 / 2 / 10</td>
                        <td>23566</td>
                        <td class="text-center"><i class="bi bi-check-circle-fill text-success fs-5"></i></td>
                    </tr>
                    <tr onclick="window.location.href=''">
                        <th scope="row">3</th>
                        <td>456222469</td>
                        <td>2023 / 2 / 10</td>
                        <td>23566</td>
                        <td class="text-center"><i class="bi bi-x-circle-fill text-danger fs-5"></i></td>
                    </tr>
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
                        <form>
                            <div class="mb-3">
                                <label for="accNo" class="col-form-label">Account No:</label>
                                <input type="number" class="form-control" id="accNo">
                            </div>
                            <div class="mb-3">
                                <label for="date" class="col-form-label">Date:</label>
                                <input type="date" class="form-control" id="date">
                            </div>
                            <div class="mb-3">
                                <label for="reading" class="col-form-label">Reading:</label>
                                <input type="number" class="form-control" id="reading">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-success">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endsection
