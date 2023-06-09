<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'status',
        'old_reading',
        'new_reading',
        'old_reading_date',
        'new_reading_date',
        'units',
        'range_one_cost',
        'range_two_cost',
        'range_three_cost',
        'charge_fixed',
        'charge_for_units',
        'charge_for_month',
        'last_payment',
        // 'last_month_total_charge',
        'balance_forward',
        'charge_total',
    ];

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id');
    }
}
