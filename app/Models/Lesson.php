<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    //
    protected $fillable = [
        'title',
        'description',
        'language',
        'video_url',
        'thumbnail_url',
        'pdf_url',
        'category_id',
        'tutor_id',
        'is_active'
    ];


    public function category()
    {
        return $this->belongsTo(LessonCategory::class, 'category_id');
    }

    public function statuses()
    {
        return $this->hasMany(LessonUserStatus::class);
    }

    public function tutor()
    {
        return $this->belongsTo(User::class, 'tutor_id');
    }
}
