<?php

namespace App\Http\Controllers;
use App\DataTables\PaymentsDataTable;
use App\Models\Bill;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Payment;
use Illuminate\Http\Request;

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
    public function customerPayment(PaymentsDataTable $dataTable)
    {
        $user = Auth::user();
        if (!$user) {
            abort(401);
        }
        $payments = Payment::whereHas('bill.user', function ($query) use ($user) {
            $query->where('id', $user->id);
        })->get();
        $dataTable->setBillId($payments);
        return $dataTable->render('customer.payment');
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
