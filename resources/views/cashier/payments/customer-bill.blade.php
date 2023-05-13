@extends('layouts.app')

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
        <table class="table table-sm">
            <thead>
              <tr class="table-active">
                <th class="col-1">ID</th>
                <th class="col-3">Account No</th>
                <th class="col-3">Date</th>
                <th class="col-3">Address</th>
                <th class="col-2">Balance</th>
              </tr>
            </thead>
            <tbody class="table-light">
              <tr onclick="window.location.href='{{ route('genarate-bill') }}'">
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Otto</td> 
                <td>@mdo</td>
                <td>10000</td>
              </tr>
              <tr onclick="window.location.href='{{ route('genarate-bill') }}'">
                <th scope="row">2</th>
                <td>Jacob</td>
                <td>Thornton</td>
                <td>@fat</td>
                <td>10000</td>
              </tr>
              <tr onclick="window.location.href='{{ route('genarate-bill') }}'">
                <th scope="row">3</th>
                <td>Larry the Bird</td>
                <td>@twitter</td>
                <td>@mdo</td>
                <td>2000</td>
              </tr>
            </tbody>
          </table>
    </div>
@endsection