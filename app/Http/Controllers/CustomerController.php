<?php

namespace App\Http\Controllers;

use Dompdf\Dompdf;
use Dompdf\Options;
use PDF;
use Barryvdh\Snappy\Facades\SnappyPdf;
use App\DataTables\PaymentsDataTable;
use App\DataTables\CustomerBillsDataTable;
use App\DataTables\CustomersDataTable;
use Illuminate\Support\Facades\DB;
use App\Models\Bill;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    public function customerHome()
    {
        return view('customer.home');
    }
    public function customerDetails(CustomerBillsDataTable $dataTable)
    {
        $user = Auth::user();
        $userId = $user->id;
        $dataTable->setUserId($userId);
        return $dataTable->render('customer.details');
    }

    public function show($id)
    {
        $user = Auth::user();
        $bill = Bill::findOrFail($id);


        return response()->json([
            // Bill Details
            'id' => $bill->id,
            'units' => $bill->units,
            'old_reading' => $bill->old_reading,
            'new_reading' => $bill->new_reading,
            'status' => $bill->status,
            'new_reading_date' => $bill->new_reading_date,
            'old_reading_date' => $bill->old_reading_date,
            'charge_fixed' => $bill->charge_fixed,
            'charge_for_units' => $bill->charge_for_units,
            'charge_for_month' => $bill->charge_for_month,
            'last_payment' => $bill->last_payment,
            'balance_forward' => $bill->balance_forward,
            'charge_total' => $bill->charge_total,

            // User Details
            'user_id' =>  $user->id,
            'user_name' => $user->name,
            'user_email' => $user->email,
            'user_account_number' => $user->account_number,
            'user_address' => $user->address,
            'user_nic' => $user->nic,
            'user_phone' => $user->phone,
            'user_account_type' => $user->account_type,
            'user_area' => $user->area,
        ]);
    }

    // Generate PDF/ Assuming you have a Bill model
    
    public function downloadBillPDF($billId)
    {
        // Retrieve the bill based on the provided ID
        $bill = Bill::find($billId);
    
        if (!$bill) {
            // Handle case when bill is not found
            return redirect()->back()->with('error', 'Bill not found.');
        }
    
        // Create a new instance of Dompdf
        $dompdf = new Dompdf();
    
        // Set any options you want (optional)
        $options = new Options();
        $options->set('defaultFont', 'Arial'); // Set the default font
        $dompdf->setOptions($options);
    
        // Load the HTML view file into Dompdf
        $html = view('layouts.bill_pdf', compact('bill'))->render();
        $dompdf->loadHtml($html);
    
        // Render the PDF
        $dompdf->render();
    
        // Generate the PDF filename
        $filename = 'bill_' . $bill->id . '.pdf';
    
        // Output the PDF for download
        return $dompdf->stream($filename);
    }
    

    public function customerPayment(PaymentsDataTable $dataTable)
    {
        $user = Auth::user();
        $userId = $user->id;
        $billId = DB::table('bills')
            ->select('id')
            ->where('user_id', '=', $userId);

        // $payments = DB::table('payments')
        //     ->select('*')
        //     ->where('bill_id', '=', $billId)
        //     ->orderBy('date', 'DESC')
        //     ->limit(1);
        $dataTable->setBillId($billId);
        return $dataTable->render('customer.payment');
    }


    public function customerProfile()
    {
        return view('customer.profile');
    }

    // Profile Info Update Funtion

    public function updateProfileInfo(Request $request)
    {
        $user = Auth::user();

        $data = $request->validate([
            'fname' => 'string|max:255',
            'nic' => 'max:12',
            'email' => 'email|unique:users,email,' . $user->id,
            'address' => 'max:255',
            'pNumber' => 'max:10'
        ]);

        $user->update([
            'name' => $data['fname'] ?? $user->name,
            'nic' => $data['nic'] ?? $user->nic,
            'email' => $data['email'] ?? $user->email,
            'address' => $data['address'] ?? $user->address,
            'phone' => $data['pNumber'] ?? $user->phone,
            'update_at' => now()
        ]);

        return redirect()->back()->with('success', 'Profile Details Updated Successfully.');
    }

    // Password Update Function

    public function updateProfilePassword(Request $request)
    {
        $user = Auth::user();
        $request->validate([
            'currentPassword' => 'required|string|max:255',
            'newPassword' => 'required|confirmed|string|min:8|max:255',
            'confirmPassword' => 'required|string|max:255',
        ]);

        if (!Hash::check($request->currentPassword, $user->password)) {
            return redirect()->back()->with('error', "Current Password is Invalid");
        }

        if (strcmp($request->currentPassword, $request->newPassword) == 0) {
            return redirect()->back()->with("error", "New Password cannot be same as your current password.");
        }

        $user->password =  Hash::make($request->newPassword);
        $user->save();
        return redirect()->back()->with('success', "Password Changed Successfully");
    }
}
