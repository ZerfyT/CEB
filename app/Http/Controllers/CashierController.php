<?php

namespace App\Http\Controllers;

use App\DataTables\BillsDataTable;
use App\DataTables\PaymentHistoryDataTable;
use App\DataTables\UsersDataTable;
use App\Jobs\SendPaymentReceipt;
use App\Models\Bill;
use App\Models\Payment;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Bus;
use Illuminate\Support\Facades\Hash;
use TijsVerkoyen\CssToInlineStyles\CssToInlineStyles;

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

    // Display customer list.
    public function cashierPayments()
    {
        $dataTable = new UsersDataTable('components.tb_action_view_cus_bills');

        return $dataTable->render('cashier.payments.payment-home');
    }

    public function cashierPay(Request $request)
    {
        $bill = Bill::findOrFail($request->billId);
        if (! $request->payAmount > 0) {
            return redirect()->back()->with('error', 'Please enter a valid amount.');
        }
        $payments = new Payment([
            'bill_id' => $bill->id,
            'status' => true,
            'payment_type' => 'CASH',
            'amount' => $bill->charge_total,
            'paid_amount' => $request->payAmount,
            'balance' => $bill->charge_total - $request->payAmount,
            'date' => now(),
        ]);
        if ($payments->save()) {

            // Send payment receipt to customer via email.
            Bus::chain([
                new SendPaymentReceipt($payments),
            ])->dispatch();

            return redirect()->back()->with('success', 'Payment Successful');
        }

        return redirect()->back()->with('error', 'Please try again.');
    }

    public function downloadBill($billId)
    {
        $bill = Bill::findOrFail($billId);
        $user = User::findOrFail($bill->user_id);

        // $view = view('layouts.ebill2pdf', ['bill' => $bill, 'user' => $user]);
        // $html = $view->render();
        // $cssToInlineStyles = new CssToInlineStyles();
        // $cssToInlineStyles->setHTML($html);
        // $cssToInlineStyles->setUseInlineStylesBlock(true);
        // $htmlWithInlineStyles = $cssToInlineStyles->convert($html);

        // Find the specific section within the HTML
        // $startMarker = '<div id="pdf-content" class="container bill-container p-4 my-3">';
        // $endMarker = '<span style="display: none;"></span>';
        // $startPosition = strpos($htmlWithInlineStyles, $startMarker);
        // $endPosition = strpos($htmlWithInlineStyles, $endMarker);
        // $length = $endPosition - $startPosition + strlen($endMarker);
        // $sectionHtml = substr($htmlWithInlineStyles, $startPosition, $length);

        // $pdf = Pdf::loadHTML($html);

        $pdf = Pdf::loadView('layouts.ebill2pdf', ['bill' => $bill, 'user' => $user]);

        return $pdf->download('invoice.pdf');
        // return view('cashier.payments.download-bill', compact('bill'));
    }

    public function cashierCustomerBills($userId)
    {
        $user = User::findOrFail($userId);
        $dataTable = new BillsDataTable($user);

        return $dataTable->render('cashier.payments.customer-bills', compact('user'));
    }

    public function cashierGenarateBill($billId)
    {

        $bill = Bill::findOrFail($billId);
        $user = User::findOrFail($bill->user_id);

        return view('cashier.payments.genarate-bill', compact('bill', 'user'));
    }

    // Display payment history of customers.
    public function cashierPaymentHistory()
    {
        $dataTable = new PaymentHistoryDataTable();

        return $dataTable->render('cashier.payment-history');
    }

    // Display cashier profile details.
    public function cashierProfile()
    {
        return view('cashier.profile');
    }

    public function updateProfileInfo(Request $request)
    {
        $user = Auth::user();

        $data = $request->validate([
            'fname' => 'string|max:255',
            'nic' => 'max:12',
            'email' => 'email|unique:users,email,'.$user->id,
            'address' => 'max:255',
            'pNumber' => 'max:10',
        ]);

        $user->update([
            'name' => $data['fname'] ?? $user->name,
            'nic' => $data['nic'] ?? $user->nic,
            'email' => $data['email'] ?? $user->email,
            'address' => $data['address'] ?? $user->address,
            'phone' => $data['pNumber'] ?? $user->phone,
            'update_at' => now(),
        ]);

        return redirect()->back()->with('success', 'Profile details updated successfully.');
    }

    public function updateProfilePassword(Request $request)
    {
        $user = Auth::user();
        $request->validate([
            'currentPassword' => 'required|string|max:255',
            'newPassword' => 'required|confirmed|string|min:8|max:255',
            'confirmPassword' => 'required|string|max:255',
        ]);

        if (! Hash::check($request->currentPassword, $user->password)) {
            return redirect()->back()->with('error', 'Current Password is Invalid');
        }

        if (strcmp($request->currentPassword, $request->newPassword) != 0) {
            return redirect()->back()->with('error', 'New Password cannot be same as your current password.');
        }

        $user->password = Hash::make($request->newPassword);
        $user->save();

        return redirect()->back()->with('success', 'Password Changed Successfully');
    }

    // public function cashierReceipt()
    // {
    //     return view('cashier.payments.payment-receipt');
    // }
}
