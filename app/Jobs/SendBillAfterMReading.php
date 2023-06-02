<?php

namespace App\Jobs;

use App\Classes\EBillGenerator;
use App\Mail\SendPDFEmail;
use App\Models\Bill;
use App\Models\User;
use App\Queries\SharedQuery;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendBillAfterMReading implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $tries = 3;

    // public $backoff = 1;
    private User $user;

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
        $eBillGen = new EBillGenerator($meterReadings, $this->user);

        $bill = Bill::create([
            'user_id' => $this->user->id,
            'status' => '1',
            'amount' => $eBillGen->createEbill()->getTotalPriceForMonth(),
            'date' => now(),
        ]);
        $bill->save();

        $pdfPath = EBillGenerator::generatePdf();

        Mail::to('abc@email.com')->send(new SendPDFEmail($pdfPath, 'Generated PDF'));
    }

    // public function retryUntil()
    // {
    //     return now()->addSeconds(30);
    // }
}
