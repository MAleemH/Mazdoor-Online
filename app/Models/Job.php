<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    // Specify the table name (if different from the default)
    protected $table = 'jobs';

    // Define the fillable attributes (columns that can be mass-assigned)
    protected $fillable = [
        'user_id',
        'title',
        'description',
        'rate',
        'status',
        // Add other columns as needed
    ];

    // Define relationships (if any)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
