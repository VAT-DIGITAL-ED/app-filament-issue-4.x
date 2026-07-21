<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use \Illuminate\Database\Eloquent\Factories\HasFactory;
    
        protected $fillable = [
        'name',
        'email',
        'phone',
        'is_email_verified',
        'is_active',
    ];
}
