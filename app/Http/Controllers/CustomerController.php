<?php

namespace App\Http\Controllers;

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
        return $dataTable->render('customer.details', ['selectedBill' => null]);
    }

    public function show($id)
    {
        $bill = Bill::findOrFail($id);

        return response()->json([
            'id' => $bill->id,
            'user_id' => $bill->user_id,
            'units' => $bill->units,
        ]);
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
