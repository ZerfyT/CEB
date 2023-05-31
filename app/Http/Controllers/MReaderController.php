<?php

namespace App\Http\Controllers;

use App\DataTables\MeterReadingsDataTable;
use App\DataTables\UsersDataTable;
use App\Models\MeterReading;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class MReaderController extends Controller
{

    /**
     * Register a new Customer
     */
    public function registerCustomer(Request $request)
    {
        $user = User::create([
            'name' => $request->fname,
            'email' => $request->email,
            'password' => Hash::make('password'),
            'phone' => $request->pNumber,
            'address' => $request->address,
            'role_id' => '5',
        ]);
        $user->save();
        return redirect()->route('mreader.customers');
    }


    /**
     * Add new Meter Reading to DB.
     */
    public function saveMReading(Request $request)
    {
        // $user = User::where('account_number', $request->accNo)->first();
        $user = User::findOrFail($request->user_id);
//        Debugger::info($user);
        $carbon = Carbon::createFromFormat('Y-m-d', $request->date);

        $dateSubmit = DB::table('meter_readings')
            ->where('user_id', $user->id)
            ->whereYear('date', $carbon->year)
            ->whereMonth('date', $carbon->month)
            ->exists();

        if ($user) {
            if (!$dateSubmit) {
                $mReading = MeterReading::create([
                    'user_id' => $user->id,
                    'meter_reading' => $request->reading,
                    'date' => $request->date,
                ]);
                $mReading->save();
                return redirect()->back()->with('success', 'Meter Reading added successfully.');
            } else {
                return redirect()->back()->with('error', 'Already added.');
            }
        } else {
            return redirect()->back()->with('error', 'User Not Found');
        }
    }


    /**
     * Search User by Account Number
     */
    public function searchAccounts(Request $request, $page)
    {
        // $user = User::getUserByAccountNumber($request->searchKey);
        $user = User::where('account_number', $request->searchKey)->first();
        if (!$user) {
            return redirect()->back()->with('error', 'User Not Found');
        }

        if ($page == 'customers') {
            // $users = $user;
            // return redirect()->route('mreader.customers', compact('users'));
            return $this->customerList($user->id);
        } else if ($page == 'mReadings') {
            $mReadings = MeterReading::where('user_id', $user->id)->get();
            if (!$mReadings) {
                return redirect()->back()->with('error', 'No Readings found.');
            }
            return $this->mReadings($user->id);

            // return redirect()->route('mreader.readings', ['user_id' => $user->id]);
        }
    }

    public function customerList(UsersDataTable $dataTable)
    {
        // $data = User::select('*');
        // return DataTables::of($data)
        //     ->addColumnIndex()
        //     ->addColumn('action', function ($data) {
        //         $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">View</a>';
        //         return $btn;
        //     })
        //     ->rawColumns(['action'])
        //     ->make(true);
        // return view('mreader.customers-list');

        return $dataTable->render('mreader.customers-list');
    }

    public function mReadings(MeterReadingsDataTable $dataTable)
    {
        // $mReadings = DB::table('meter_readings')
        //     ->crossJoin('users', 'users.id', '=', 'meter_readings.user_id')
        //     ->select('meter_readings.*', 'users.name', 'users.address', 'users.account_number');

        // if (isset($user_id)) {
        //     $mReadings->where('user_id', $user_id);
        // }
        // $mReadings = $mReadings->orderBy('users.address')->get();
        // return view('mreader.mreading-list', compact('mReadings'));
        return $dataTable->render('mreader.mreading-list');
    }


    /**
     * Update Profile Info
     */
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

        // $user->name = $request->fname;
        // // $user->nic = $request->nic ?? '';
        // $user->email = $request->email;
        // // $user->address = $request->address ?? ' ';
        // $user->phone = $request->pNumber ?? ' ';
        // $user->save();

        return redirect()->back()->with('success', 'Profile details updated successfully.');
    }

    /**
     * Update Profile Password
     */
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

    /**
     * Routes for Meter Reader
     */

    public function index()
    {
        return view('mreader.home');
    }

    public function profile()
    {
        return view('mreader.profile');
    }
}
