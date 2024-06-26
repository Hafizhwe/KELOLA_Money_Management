<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $table = 'transactions';

    protected $fillable = [
        'user_id',
        'type',
        'date',
        'amount',
        'source_bank',
        'notes',
    ];

    // Relationship with User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    
}

