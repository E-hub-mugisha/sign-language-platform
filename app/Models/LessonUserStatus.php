<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LessonUserStatus extends Model
{
    //
    protected $table = 'lesson_user_status';

    protected $fillable = [
        'user_id',
        'lesson_id',
        'status',
        'favorite'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }
}
