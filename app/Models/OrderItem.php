<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    // Define fillable attributes for mass assignment
    protected $fillable = [
        'order_id', // Ensure this matches your table column name
        'product_id',
        'quantity',
        'price',
        'total',
    ];

    // Define the relationship to the Order model
    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id'); // Explicitly set the foreign key
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id'); // Adjust this if necessary
    }
}
