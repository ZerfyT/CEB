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
                <li class="breadcrumb-item active" aria-current="page">Profile</li>
            </ol>
        </nav>

        {{-- Heading --}}
        <h2 class="fw-bold">Profile Info</h2>

        <div class="container">
            <div class="row border rounded shadow-sm">
                <div class="col-md-6 border border-top-0 border-bottom-0 border-start-0 shadow-sm">
                    <form class="p-3">
                        <div class="mb-3">
                            <label for="fname">Full Name</label>
                            <input type="text" class="form-control" id="fname" name="fname"
                                placeholder="Full Name">
                        </div>
                        <div class="mb-3">
                            <label for="nic">NIC</label>
                            <input type="text" class="form-control" id="nic" name="nic" placeholder="NIC">
                        </div>
                        <div class="mb-3">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                        </div>
                        <div class="mb-3">
                            <label for="pNumber">Phone Number</label>
                            <input type="number" class="form-control" id="pNumber" name="pNumber"
                                placeholder="+94 777 666 555">
                        </div>
                        <div class="form-group text-center">
                            <button class="btn btn-danger" name="btnSaveDetails">Save</button>
                        </div>

                    </form>
                </div>
                <div class="col-md-6">
                    <form class="p-3">
                        <div class="mb-3">
                            <label for="currentPassword">Current Password</label>
                            <input type="password" class="form-control" id="currentPassword" name="currentPassword"
                                placeholder="Current Password">
                        </div>
                        <div class="mb-3">
                            <label for="newPassword">New Password</label>
                            <input type="password" class="form-control" id="newPassword" name="newPassword"
                                placeholder="New Password" aria-labelledby="passwordHelpLine">
                            <span class="form-text" id="passwordHelpLine">Must be 8-20 characters long.</span>
                        </div>
                        <div class="mb-3">
                            <label for="confirmPassword">Confirm Password</label>
                            <input type="password" class="form-control" id="confirmPassword" name="confirmPassword"
                                placeholder="Confirm Password">
                        </div>
                        <div class="text-center">
                            <button class="btn btn-danger">Change Password</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
