<?php

namespace App\Jobs;

use App\Classes\EBillGenerator;
use App\Models\Bill;
use App\Models\User;
use App\Queries\SharedQuery;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Session;

class CreateBill implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private User $user;

    public $tries = 1;

    public $backoff = 1;

    /**
     * Create a new job instance.
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $meterReadings = SharedQuery::getLastTwoMeterReadings($this->user->id);
        $lastBill = SharedQuery::getLastBill($this->user->id);
        // $lastSecondBill = SharedQuery::getLastSecondBill($this->user->id);
        $lastPayment = SharedQuery::getLastPayment($lastBill->id ?? null);
        $eBillGen = new EBillGenerator($meterReadings, $this->user, $lastBill, $lastPayment);
        $eBill = $eBillGen->eBill;

        $bill = Bill::create([
            'user_id' => $this->user->id,
            'status' => false,
            'old_reading' => $eBill->previousMeterReading,
            'new_reading' => $eBill->lastMeterReading,
            'old_reading_date' => Carbon::parse($eBill->previousMeterReadingDate),
            'new_reading_date' => Carbon::parse($eBill->lastMeterReadingDate),
            'units' => $eBill->units,
            'range_one_cost' => $eBill->totalFirstRange,
            'range_two_cost' => $eBill->totalSecondRange,
            'range_three_cost' => $eBill->totalThirdRange,
            'charge_fixed' => $eBill->getFixedCharges(),
            'charge_for_units' => $eBill->getCostForUnits(),
            'charge_for_month' => $eBill->getCostForMonth(),
            'last_payment' => $eBill->lastPaymentAmount,
            'balance_forward' => $eBill->forwardBalance,
            // 'last_month_total_charge' => $eBill->lastMonthTotalCharge,
            'charge_total' => $eBill->getTotalCost(),
        ]);
        $bill->save();

        $bill = SharedQuery::getLastBill($this->user->id);

        $pdfPath = EBillGenerator::generatePdf($bill, $this->user);
        Session::put('pdfPath', $pdfPath);
    }
}
