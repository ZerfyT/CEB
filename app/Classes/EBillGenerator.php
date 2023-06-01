<?php

namespace App\Classes;

use App\Models\User;
use \Illuminate\Support\Collection;

use function Psy\debug;

class EBillGenerator
{

    private $meterReadings;
    private $payments;
    private User $user;

    public function __construct($meterReadings, User $user, $payments = null)
    {
        $this->meterReadings = $meterReadings;
        $this->user = $user;
        $this->payments = $payments;
    }


    public function createEbill()
    {
        // $ebill = null;
        $lastPayment = null;
        $count = $this->meterReadings->count();

        if ($this->payments != null) {
            if ($this->payments->count > 0) {
                $lastPayment = $this->payments->first();
            }
        }

        if ($lastPayment != null) {
            $lastPayment = $lastPayment->balance;
        } else {
            $lastPayment = 0;
        }

        // debug([$count], 'Reading count');

        if ($count == 2) {
            $readingOld = $this->meterReadings->first();
            $readingNew = $this->meterReadings->skip(1)->take(1)->first();
            $ebill = new EBill(
                $this->user->account_number,
                $readingNew->meter_reading,
                $readingNew->date,
                $readingOld->meter_reading,
                $readingOld->date,
                $lastPayment
            );
            return $ebill;
        } elseif ($count == 1) {
            $readingNew = $this->meterReadings->first();
            $ebill = new EBill(
                $this->user->account_number,
                $readingNew->meter_reading,
                $readingNew->date,
                0,
                '',
                $lastPayment
            );
            return $ebill;
        }
        else{
            return null;
        }
    }
}
