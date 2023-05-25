<?php

namespace App\Http\Controllers;

use App\Models\MeterReading;
use App\Models\User;
use Illuminate\Http\Request;

class MReaderController extends Controller
{

    /**
     * Register a new Customer
     */
    public function registerCustomer(Request $request) {
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
    public function addMReading(Request $request) {

        $accNo = $request->accNo;
        $user_id = User::where

        $reading = MeterReading::create([

        ]);
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
        return view('mreader.customers-list' , compact('users'));
    }

    public function mReadings()
    {
        return view('mreader.mreading-list');
    }

    public function profile()
    {
        return view('mreader.profile');
    }

}
