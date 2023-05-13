<?php

namespace App\Http\Controllers;

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
        return view('cashier.payments.payment-home');
    }

    public function cashierPay()
    {
        return view('cashier.payments.paybill');
    }

    public function cashierCustomerBill()
    {
        return view('cashier.payments.customer-bill');
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
