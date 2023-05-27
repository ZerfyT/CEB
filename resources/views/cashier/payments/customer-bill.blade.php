@extends('layouts.app')

@section('sidebar')
    @include('cashier.sidebar')
@endsection

@section('content')
    <label class="form-control" for="floatingInput">Payment</label> <br>
    <h2 class="fw-bold">Payment</h2>

    {{-- Table --}}
    <div class="container py-4">
        <table class="table table-sm table-bordered table-hover">
            <thead>
                <tr class="bg-secondary">
                    <th class="col-1">ID</th>
                    <th class="col-3">User Id</th>
                    <th class="col-3">Date</th>
                    <th class="col-3">Balance</th>
                    <th class="col-2">Status</th>
                </tr>
            </thead>
            <tbody class="table-light">
                @foreach ($bills as $bill)
                    <tr onclick="window.location.href='{{ route('genarate-bill',$bill->id) }}'">
                        <th scope="row">{{ $bill->id }}</th>
                        <td>{{ $bill->user_id }}</td>
                        <td>{{ $bill->date }}</td>
                        <td>{{ $bill->amount }}</td>
                        <td>{{ $bill->status }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
