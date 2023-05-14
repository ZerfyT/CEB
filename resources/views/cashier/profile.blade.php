@extends('layouts.app')

@section('sidebar')
    @include('cashier.sidebar')
@endsection

@section('content')
    <label class="form-control" for="floatingInput">Cashier/Profile</label> <br>
    <h2 class="fw-bold">Profile</h2>

    <div class="container d-flex justify-content-center w-100">
        <div class="row w-100">
            <div class="col-5">
                <div class="container-fluid mx-5 p-5">
                    <form>
                        <div class="form-group">
                            <label for="formGroupExampleInput">Full Name</label>
                            <input type="text" class="form-control mb-4" id="formGroupExampleInput"
                                placeholder="Full Name">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">NIC</label>
                            <input type="text" class="form-control mb-4" id="formGroupExampleInput2" placeholder="NIC">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Email</label>
                            <input type="email" class="form-control mb-4" id="formGroupExampleInput2" placeholder="Email">
                        </div>
                        <div class="form-group text-center">
                            <button class="btn btn-danger">Save</button>
                        </div>

                    </form>
                </div>
            </div>
            <div class="col-5">
                <div class="container-fluid mx-5 p-5">
                    <form>
                        <div class="form-group">
                            <label for="formGroupExampleInput">Current Password</label>
                            <input type="password" class="form-control mb-4" id="formGroupExampleInput"
                                placeholder="Current Password">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">New Password</label>
                            <input type="password" class="form-control mb-4" id="formGroupExampleInput2"
                                placeholder="New Password">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Confirm Password</label>
                            <input type="password" class="form-control mb-4" id="formGroupExampleInput2"
                                placeholder="Confirm Password">
                        </div>
                        <div class="text-center">
                            <button class="btn btn-danger">Change Password</button>
                        </div>

                </div>
                </form>
            </div>

        </div>

    </div>
@endsection
