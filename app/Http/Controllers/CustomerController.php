<?php

namespace App\Http\Controllers;

class CustomerController extends Controller
{
    public function customerHome()
    {
        return view('customer.home');
    }

    public function customerAccount()
    {
        return view('customer.account');
    }

    public function customerPayment()
    {
        return view('customer.payment');
    }

    public function customerProfile()
    {
        return view('customer.profile');
    }

    public function customerDetails()
    {
        return view('customer.details');
    }
}
