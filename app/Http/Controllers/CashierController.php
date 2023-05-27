<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Bill;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class CashierController extends Controller
{
    // Display cashier email history.
    public function cashierEmail()
    {
        return view('cashier.email-history');
    }

    // Display cashier homepage.
    public function cashierHomepage()
    {
        return view('cashier.home');
    }

    // Display customers in cashier payments page.
    public function cashierPayments()
    {
        $customers = User::where('role_id', 5)->get();
        return view('cashier.payments.payment-home', compact('customers'));
    }

    public function cashierPay()
    {
        return view('cashier.payments.paybill');
    }

    // Display each customer's bills according to customer ID.
    public function cashierCustomerBill($customer_id, $bill_id)
    {

        $customer = User::findOrFail($customer_id);
        $bill = $customer->bills()->findOrFail($bill_id);

        return view('cashier.payments.customer-bill', ['customer' => $customer->id, 'bill' => $bill->id]);
    }


    // Display genarated bill according to bill id using customer and bill details.
    public function cashierGenarateBill($bill_id)
    {

        $bill = Bill::findOrFail($bill_id);
        $customer = $bill->user;

        return view('cashier.payments.genarate-bill', ['customer' => $customer, 'bill' => $bill]);
    }

    // Display payment history of customers.
    public function cashierPaymentHistory()
    {
        $payments = Payment::all();
        return view('cashier.payment-history', compact('payments'));
    }

    // Display cashier profile details.
    public function cashierProfile()
    {
        return view('cashier.profile');
    }

    public function cashierReceipt()
    {
        return view('cashier.payments.payment-receipt');
    }
}
