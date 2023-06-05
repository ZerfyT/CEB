<?php

namespace App\Jobs;

use App\Mail\SendPaymentReceiptEmail;
use App\Mail\SendPDFEmail;
use App\Models\Bill;
use App\Models\Payment;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class SendPaymentReceipt implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;


    private Payment $payment;

    /**
     * Create a new job instance.
     */
    public function __construct(Payment $payment)
    {
        $this->payment = $payment;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        // $bill = Bill::findOrFail($this->payment->bill_id);
        // $user = User::findOrFail($bill->user_id);

        $pdfPath = storage_path('app\public\mybill.pdf');
        $pdf = Pdf::loadView('layouts.payment_receipt')->save($pdfPath);
        Mail::to('abc@email.com')->send(new SendPaymentReceiptEmail($pdfPath, 'Payment Receipt'));
        // return $pdf->download('invoice.pdf');
    }
}
