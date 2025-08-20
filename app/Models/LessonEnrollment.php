<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LessonEnrollment extends Model
{
    use HasFactory;

    protected $fillable = [
        'lesson_id',
        'user_id',
        'enrolled_at',
        'status',
    ];

    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
