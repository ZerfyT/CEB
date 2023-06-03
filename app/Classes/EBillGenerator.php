<?php

namespace App\Classes;

use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Dompdf\Dompdf;
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
            if ($this->payments->count() > 0) {
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
            $readingNew = $this->meterReadings->first();
            $readingOld = $this->meterReadings->skip(1)->take(1)->first();
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
        } else {
            return null;
        }
    }

    /**
     * Create PDF File
     */
    public static function generatePdf()
    {
        // $domPDF = new Dompdf();
        // $domPDF->loadHtml(storage_path('app\public\ebill2pdf.html'));
        // $domPDF->setPaper('A4', 'portrait');
        // $domPDF->render();
        // $pdfContent = $domPDF->output();
        // $pdfPath = storage_path('app\public\mybill.pdf');
        // file_put_contents($pdfPath, $pdfContent);

        // return $pdfPath;

        $pdfPath = storage_path('app\public\mybill.pdf');
        $pdf = Pdf::loadView('layouts.ebill2pdf')
            ->save($pdfPath);
        // $pdf->download();
        return $pdfPath;
    }
}
