<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MeterReading extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'meter_reading',
        'date',
    ];

    public function user()
    {
        return $this->hasOne(User::class);
    }
}
