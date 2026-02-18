<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
        protected $fillable = [
        'name',
        'email',
        'phone',
        'is_email_verified',
        'is_active',
    ];
}
