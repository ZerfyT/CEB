<?php

namespace App\Classes;

use App\Models\Bill;
use App\Models\Payment;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;

class EBillGenerator
{
    private Collection $meterReadings;

    private ?Payment $lastPayment;

    private ?Bill $lastBill;

    private User $user;

    private bool $hasPayment = false;

    public EBill $eBill;

    public function __construct(Collection $meterReadings, User $user, Bill $lastBill = null, Payment $lastPayment = null)
    {
        $this->meterReadings = $meterReadings;
        $this->user = $user;
        $this->lastBill = $lastBill;
        $this->lastPayment = $lastPayment;
        $this->createEbill();
    }

    private function createEbill()
    {
        $count = $this->meterReadings->count();
        $lastPaymentAmount = $this->getLastPaymentAmount();
        $lastBillForwardAmount = $this->getLastBillForwardAmount();
        // $lastBillTotalAmount = $this->getLastBillTotalAmount();

        if ($count == 2) {
            $readingNew = $this->meterReadings->first();
            $readingOld = $this->meterReadings->skip(1)->take(1)->first();
            $this->eBill = new EBill(
                $this->user->account_number,
                $readingNew->meter_reading,
                $readingNew->date,
                $readingOld->meter_reading,
                $readingOld->date,
                $lastBillForwardAmount,
                $lastPaymentAmount,
                // $lastBillTotalAmount
            );

        // return $ebill;
        } elseif ($count == 1) {
            $readingNew = $this->meterReadings->first();
            $this->eBill = new EBill(
                $this->user->account_number,
                $readingNew->meter_reading,
                $readingNew->date,
                0,
                Carbon::parse($readingNew->date)->subMonth(),
                $lastBillForwardAmount,
                $lastPaymentAmount,
                // $lastBillTotalAmount
            );
        }
    }

    private function getLastPaymentAmount()
    {
        if (empty($this->lastPayment) || is_null($this->lastPayment)) {
            return 0;
        }

        if ($this->lastPayment->date < $this->lastBill->new_reading_date) {
            return 0;
        }

        return $this->lastPayment->paid_amount;
    }

    // private function getLastBillTotalAmount()
    // {
    //     if (empty($this->lastBill) || is_null($this->lastBill)) {
    //         return 0;
    //     }

    //     return $this->lastBill->charge_total;
    // }

    private function getLastBillForwardAmount()
    {
        if (empty($this->lastBill) || is_null($this->lastBill)) {
            return 0;
        }

        return $this->lastBill->charge_total;
    }

    public static function generatePdf($bill, $user)
    {
        // $domPDF = new Dompdf();
        // $domPDF->loadHtml(storage_path('app\public\ebill2pdf.html'));
        // $domPDF->setPaper('A4', 'portrait');
        // $domPDF->render();
        // $pdfContent = $domPDF->output();
        // $pdfPath = storage_path('app\public\mybill.pdf');
        // file_put_contents($pdfPath, $pdfContent);

        // return $pdfPath;

        // $pdf = Pdf::loadFile(public_path('ebill2pdf.html'))
        //     ->save(public_path('mybill.pdf'));
        // $pdf->download();

        // Pdf::setOption(['dpi' => 150, 'defaultFont' => 'sans-serif']);
        $pdfPath = storage_path('app\public\mybill.pdf');
        $pdf = Pdf::loadView('layouts.ebill2pdf', ['bill' => $bill, 'user' => $user])
            ->save($pdfPath);
        // $pdf->download();
        return $pdfPath;
    }
}
