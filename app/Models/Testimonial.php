<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    //
    protected $fillable = [
        'name',
        'role', // e.g., student, parent
        'photo', // optional student image
        'message',
        'rating', // 1–5 stars
        'active', // boolean to indicate if the testimonial is active
    ];

    
}
