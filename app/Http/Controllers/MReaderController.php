<?php

namespace App\Http\Controllers;

use App\DataTables\UsersDataTable;
use App\Models\MeterReading;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
            'password' => bcrypt('password'),
            'phone' => $request->pNumber,
            'address' => $request->address,
            'role_id' => '5',
        ]);
        $user->save();
        return redirect()->route('mreader.customers');
    }


    /**
     * Load Meter Reading Submit Form Modal
     */
    public function createMReadingModal($userId)
    {
        $user = User::findOrFail($userId);
        return view('components.modal_add_reading')->with('user', $user);
    }


    /**
     * Add new Meter Reading to DB.
     */
    public function saveMReading(Request $request, $userId)
    {
        // $user = User::where('account_number', $request->accNo)->first();
        $user = User::findOrFail($userId);
        $carbon = Carbon::createFromFormat('Y-m-d', $request->date);
        $dateSubmit = DB::table('meter_readings')
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

    /**
     * Update Profile Info
     */
    public function updateProfileInfo(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'fname' => 'string|max:255',
            'email' => 'email|unique:users,email,' . $user->id,
            'pNumber' => 'numeric|max:10'

        ]);

        $user->name = $request->fname;
        $user->email = $request->email;
        $user->phone = $request->pNumber;
        $user->save();

        return redirect()->back()->with('success', 'Profile details updated successfully.');
    }



    /**
     * Routes for Meter Reader
     */

    public function index()
    {
        return view('mreader.home');
    }


    // public function customerList($user_id = null)
    // {
    //     $users = User::where('role_id', 5);
    //     if (isset($user_id)) {
    //         $users = $users->where('id', $user_id);
    //     }
    //     $users = $users->get();
    //     return view('mreader.customers-list', compact('users'));
    // }

    // public function customerList(UsersDataTable $dataTable)
    // public function customerList($user_id = null)
    // {
    //     $users = User::where('role_id', 5);
    //     if (isset($user_id)) {
    //         $users = $users->where('id', $user_id);
    //     }
    //     $users = $users->get();
    //     return view('mreader.customers-list', compact('users'));
    // }

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


    public function mReadings($user_id = null)
    {
        $mReadings = DB::table('meter_readings')
            ->crossJoin('users', 'users.id', '=', 'meter_readings.user_id')
            ->select('meter_readings.*', 'users.name', 'users.address', 'users.account_number');

        if (isset($user_id)) {
            $mReadings->where('user_id', $user_id);
        }
        $mReadings = $mReadings->orderBy('users.address')->get();
        return view('mreader.mreading-list', compact('mReadings'));
    }


    public function profile()
    {
        return view('mreader.profile');
    }
}
