<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployerCategory extends Model
{
    use HasFactory;

    protected $fillable = ['category'];

    // Add the relationship to User (Employer)
    public function employer()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
