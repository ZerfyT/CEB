<?php

namespace App\Classes;

class EBill
{
    public string $accountNumber;

    public int $lastMeterReading;

    public int $previousMeterReading;

    public string $lastMeterReadingDate;

    public string $previousMeterReadingDate;

    public float $forwardBalance;

    public float $totalFirstRange = 0.0;

    public float $totalSecondRange = 0.0;

    public float $totalThirdRange = 0.0;

    private const FIXED_CHARGES_FIRST = 500.0;

    private const FIXED_CHARGES_SECOND = 1000.0;

    private const FIXED_CHARGES_THIRD = 1500.0;

    private const PRICE_FIRST_RANGE = 20.0;

    private const PRICE_SECOND_RANGE = 35.0;

    private const PRICE_THIRD_RANGE = 40.0;

    public $units;

    public function __construct(
        string $accountNumber,
        int $lastMeterReading,
        string $lastMeterReadingDate,
        int $previousMeterReading = 0,
        string $previousMeterReadingDate = '',
        float $forwardBalance = 0.00
    ) {
        $this->accountNumber = $accountNumber;
        $this->lastMeterReading = $lastMeterReading;
        $this->lastMeterReadingDate = $lastMeterReadingDate;
        $this->previousMeterReading = $previousMeterReading;
        $this->previousMeterReadingDate = $previousMeterReadingDate;
        $this->units = $lastMeterReading - $previousMeterReading;
        $this->forwardBalance = $forwardBalance;
        $this->calculateBill();
    }

    public function getTotalPriceForUnits()
    {
        return $this->totalFirstRange + $this->totalSecondRange + $this->totalThirdRange;
    }

    public function getTotalPriceForMonth()
    {
        return $this->getTotalPriceForUnits() + $this->getFixedCharges();
    }

    public function getFixedCharges()
    {
        if ($this->units < 30) {
            return self::FIXED_CHARGES_FIRST;
        } elseif (30 < $this->units && $this->units <= 60) {
            return self::FIXED_CHARGES_SECOND;
        } elseif ($this->units > 60) {
            return self::FIXED_CHARGES_THIRD;
        }
    }

    public function getTotalPrice()
    {
        return $this->getTotalPriceForMonth() - $this->forwardBalance;
    }

    private function calculateBill()
    {
        $units = $this->units;
        $priceThirdRangeTmp = self::PRICE_THIRD_RANGE;

        while ($units > 0) {

            if ($units > 30) {
                // units <= 30
                $this->totalFirstRange = 30 * self::PRICE_FIRST_RANGE;
                $units -= 30;

                if ($units > 60) {
                    // units > 30, units <= 60
                    $this->totalSecondRange = 30 * self::PRICE_SECOND_RANGE;
                    $units -= 30;

                    // units > 60 (for all)
                    for ($i = 1; $i <= $units; $i++) {
                        $this->totalThirdRange += $priceThirdRangeTmp;
                        $priceThirdRangeTmp++;
                    }
                    break;
                } else {
                    $this->totalSecondRange = $units * self::PRICE_SECOND_RANGE;
                    break;
                }
            } else {
                $this->totalFirstRange = $units * self::PRICE_FIRST_RANGE;
                break;
            }
        }
    }
}
