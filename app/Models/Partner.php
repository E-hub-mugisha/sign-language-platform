<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    //
    protected $fillable = [
        'name',
        'logo', // URL or path to the logo image
        'website', // URL to the partner's website
        'is_active', // boolean to indicate if the partner is active
    ];
}
