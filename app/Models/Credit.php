<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Credit extends Model
{
    use HasFactory;

    // Disable automatic timestamps
    public $timestamps = false;

    // Fillable properties
    protected $fillable = [
        'user_id',
        'shop_id',
        'total_amount',
        'discount',
        'final_total',
        'status',
        'created_at',
        'updated_at',
    ];

    // Cast the date fields to Carbon instances
    protected $dates = ['created_at', 'updated_at'];
}
