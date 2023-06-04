<?php

namespace App\Queries;

use App\Models\Bill;
use App\Models\Payment;
use Illuminate\Support\Facades\DB;

class SharedQuery
{
    public static function getLastPayment($billId): ?Payment
    {
        if (is_null($billId)) {
            return null;
        }
        $payment = Payment::select('*')
            ->where('bill_id', $billId)
            ->latest('date')
            ->first();

        return $payment ?: null;
        // return DB::table('payments')
        //     ->select('*')
        //     ->where('bill_id', '=', $billId)
        //     ->orderBy('date', 'DESC')
        //     ->limit(1)
        //     ->get();
    }

    public static function getLastTwoMeterReadings($userId)
    {
        return DB::table('meter_readings')
            ->select('*')
            ->where('meter_reading', '<=', function ($query) {
                $query->from('meter_readings')
                    ->select(DB::raw('MAX(meter_reading)'));
            })
            ->where('user_id', '=', $userId)
            ->orderBy('meter_reading', 'desc')
            ->limit(2)
            ->get();
    }

    public static function getLastBill($userId): ?Bill
    {
        $bill = Bill::select('*')
            ->where('user_id', $userId)
            ->latest('new_reading_date')
            ->first();

        return $bill ?: null;
    }
}
