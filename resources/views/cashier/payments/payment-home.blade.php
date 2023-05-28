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
        <table id="customers-table" class="display">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Account No</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($customers as $customer)
                    <tr>
                        <td>{{ $customer->name }}</td>
                        <td>{{ $customer->email }}</td>
                        <td>{{ $customer->account_no }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>


        @push('scripts')
            <script>
                $(document).ready(function() {
                    $('#customers-table').DataTable();
                });
            </script>
        @endpush
    </div>
@endsection
