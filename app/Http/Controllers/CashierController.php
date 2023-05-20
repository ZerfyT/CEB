<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Bill;
use Illuminate\Http\Request;

class CashierController extends Controller
{
    public function cashierEmail()
    {
        return view('cashier.email-history');
    }

    public function cashierHomepage()
    {
        return view('cashier.home');
    }

    public function cashierPayments()
    {
        $customers = User::all();
        return view('cashier.payments.payment-home' , compact('customers'));
    }

    public function cashierPay()
    {
        return view('cashier.payments.paybill');
    }

    public function cashierCustomerBill(User $user)
    {
       
        $bills = Bill::where('user_id', $user->id)->get();
        return view('cashier.payments.customer-bill' ,compact('user'),compact('bills'));
    }

    public function cashierGenarateBill()
    {
        return view('cashier.payments.genarate-bill');
    }

    public function cashierPaymentHistory()
    {
        return view('cashier.payment-history');
    }

    public function cashierProfile()
    {
        return view('cashier.profile');
    }

    public function cashierReceipt()
    {
        return view('cashier.payments.payment-receipt');
    }
}
