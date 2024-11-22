<?php

namespace App\Models;

use App\Models\Lead;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = [
        'lead_id',
        'user_id',
        'comment',
        'status',
        'status_updated_at',
    ];

    // Define constants for statuses
    public const STATUSES = [
        'need_question',
        'phone_call',
        'zoom_call',
        'work_done',
        'not_interested',
        'deal_closed',
    ];

    // Relationship with Lead
    public function lead()
    {
        return $this->belongsTo(Lead::class);
    }

    // Relationship with User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }


    public function status()
    {
        return $this->belongsTo(Status::class,'name');
    }
}
