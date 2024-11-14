<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Orders extends Model
{
    use HasFactory;

    // Control whether Laravel manages timestamps
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

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    // Override the save method
    public function save(array $options = [])
    {
        // Check if created_at or updated_at are set; if not, set them to the current timestamp
        if (!$this->created_at) {
            $this->created_at = Carbon::now();
        }

        if (!$this->updated_at) {
            $this->updated_at = Carbon::now();
        }

        return parent::save($options);
    }
}
