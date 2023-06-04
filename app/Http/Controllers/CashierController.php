<?php

namespace App\Http\Controllers;

use App\Classes\EBillGenerator;
use App\DataTables\BillsDataTable;
use App\DataTables\UsersDataTable;
use App\Models\Bill;
use App\Models\Payment;
use App\Models\User;
use App\Queries\SharedQuery;

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
        $dataTable = new UsersDataTable('components.tb_action_view_cus_bills');

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
        $user = User::findOrFail($userId);

        return $dataTable->render('cashier.payments.customer-bill', compact('user'));
    }

    public function cashierGenarateBill($billId)
    {

        $bill = Bill::findOrFail($billId);
        $user = User::findOrFail($bill->user_id);
        $lastPayment = SharedQuery::getLastPayment($billId);
        $meterReadings = SharedQuery::getLastTwoMeterReadings($user->id);
        $eBillGen = new EBillGenerator($meterReadings, $user, $lastPayment);
        $eBill = $eBillGen->createEbill();

        // Pass the retrieved data to the view
        if ($eBill != null) {
            return view('cashier.payments.genarate-bill', compact('bill', 'customer', 'eBill'));
        }

        return redirect()->back()->with('error', 'No Data');
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
