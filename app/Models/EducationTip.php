<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EducationTip extends Model
{
    //
    protected $fillable = [
        'title',
        'description',
        'image',
        'user_id',
        'category_id',
        'is_active',
        'views',
        'slug',
        'tag'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(LessonCategory::class);
    }
}
