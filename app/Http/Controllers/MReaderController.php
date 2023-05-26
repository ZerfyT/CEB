<?php

namespace App\Http\Controllers;

use App\Models\MeterReading;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
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
     * Add new Meter Reading to DB.
     */
    public function addMReading(Request $request)
    {
        $user = User::where('account_number', $request->accNo)->first();
        $carbon = Carbon::createFromFormat('Y-m-d', $request->input('date'));
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
     * Routes for Meter Reader
     */
    public function index()
    {
        return view('mreader.home');
    }
    public function customerList()
    {
        $users = User::where('role_id', 5)->get();
        return view('mreader.customers-list', compact('users'));
    }

    public function mReadings()
    {
        // $lastMReading = DB::table('meter_reading')->where()
        // if() {

        // }
        // else {

        // // }
        $mReadings = DB::table('meter_readings')
            ->crossJoin('users', 'users.id', '=', 'meter_readings.user_id')
            ->select('meter_readings.*', 'users.name', 'users.address', 'users.account_number')
            ->orderBy('users.address')
            ->get();
        return view('mreader.mreading-list', compact('mReadings'));
    }

    public function profile()
    {
        return view('mreader.profile');
    }
}
