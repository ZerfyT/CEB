<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MReaderController extends Controller
{
    //
    public function index()
    {
        return view('mreader.home');
    }
    public function customerList()
    {
        return view('mreader.customers-list');
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
