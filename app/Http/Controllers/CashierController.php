<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Bill;
use App\Models\Payment;
use App\DataTables\CustomersDataTable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\DataTables\UsersDataTable;
use App\DataTables\BillsDataTable;



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
    public function cashierPayments(CustomersDataTable $dataTable)
    {
        return $dataTable->render('cashier.payments.payment-home');
    }


    public function cashierPay()
    {
        return view('cashier.payments.paybill');
    }


    public function cashierCustomerBill($userId, BillsDataTable $dataTable)
    {
        // $bills = $user->bills();
        $dataTable->setUserId($userId);
        return $dataTable->render('cashier.payments.customer-bill');
    }


    public function cashierGenarateBill($billId)
    {

        $bill = Bill::findOrFail($billId);
        // $customer = $bill->user();
        $customer = User::findOrFail($billId);
      // Pass the retrieved data to the view
        return view('cashier.payments.genarate-bill', compact('bill','customer'));
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
