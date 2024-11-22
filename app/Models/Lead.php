<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 
        'phone', 
        'email', 
        'location', 
        'company_name', 
        'designation', 
        'service', 
        'comments', 
        'assign_for',
    ];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    // In the AdminLead model (or Lead model)
public function assignedUser()
{
    return $this->belongsTo(User::class, 'assign_for');
}

    
}
