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
use App\Models\MeterReading;
use App\Classes\EBill;
use Illuminate\Support\Facades\DB;

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
        $customer = User::findOrFail($bill->user_id);
        $payments = DB::table('payments')
            ->select('*')
            ->where('bill_id', '=', $billId)
            ->orderBy('date', 'DESC')
            ->limit(1)
            ->get();
        $meterReadings = DB::table('meter_readings')
            ->select('*')
            ->where('meter_reading', '<', function ($query) {
                $query->from('meter_readings')
                    ->select(DB::raw('MAX(meter_reading)'));
            })
            ->where('user_id', '=', $customer->id)
            ->orderBy('meter_reading', 'desc')
            ->limit(2)
            ->get();


        $count = $meterReadings->count();
        $ebill = null;
        $lastPayment = null;
        if ($payments->count() > 0) {
            $lastPayment = $payments->first();
        }

        if ($count == 2) {
            $readingOld = $meterReadings->first();
            $readingNew = $meterReadings->skip(1)->take(1)->first();
            $ebill = new EBill(
                $customer->account_number,
                $readingNew->meter_reading,
                $readingNew->date,
                $readingOld->meter_reading,
                $readingOld->date,
                $lastPayment->balance ?? 0.0
            );
        }
        if ($count == 1) {
            $readingNew = $meterReadings->first();
            $ebill = new EBill(
                $customer->account_number,
                $readingNew->meter_reading,
                $readingNew->date,
                0,
                '',
                $lastPayment->balance ?? 0.00
            );
        }
        // Pass the retrieved data to the view
        if ($ebill != null) {
            return view('cashier.payments.genarate-bill', compact('bill', 'customer', 'ebill'));
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
