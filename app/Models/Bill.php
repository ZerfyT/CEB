<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Bill extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'user_id',
        'status',
        'amount',
        'date'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id');
    }

    public function payments()
    {
        return $this->hasMany(Payment::class, 'user_id');
    }
}
