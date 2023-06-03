<?php

namespace App\Http\Controllers;
use App\DataTables\PaymentsDataTable;
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

    public function customerDetails()
    {
        return view('customer.details');
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

        if (!Hash::check($request->currentPassword, $user->password))
        {
            return redirect()->back()->with('error', "Current Password is Invalid");
        }

        if (strcmp($request->currentPassword, $request->newPassword) == 0)
        {
            return redirect()->back()->with("error", "New Password cannot be same as your current password.");
        }

        $user->password =  Hash::make($request->newPassword);
        $user->save();
        return redirect()->back()->with('success', "Password Changed Successfully");
    }


}


