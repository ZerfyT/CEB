<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'bill_id',
        'status',
        'payment_type',
        'amount',
        'paid_amount',
        'balance',
        'date'
    ];

    public function bills()
    {
        return $this->hasOne(Bill::class);
    }
}
