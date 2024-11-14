<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'shop_id',
        'payment_date',
        'user_id',
        'amount',
        'payment_type',  // Fix typo here
    ];
}
