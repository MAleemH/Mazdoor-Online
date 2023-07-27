<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    use HasFactory;

    // Define the fillable attributes (columns that can be mass-assigned)
    protected $fillable = [
        'user_id',
        'specialization',
        'description',
    ];

    // Define relationships (if any)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
