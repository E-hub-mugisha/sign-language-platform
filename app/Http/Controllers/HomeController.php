<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\LessonCategory;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index()
    {
        // Fetch categories from the database
        $categories = LessonCategory::with(['lessons.tutor'])->get();
        return view('front-end.index', compact('categories'));
    }

    public function lessons()
    {
        // Fetch all lessons with their categories and tutors
        $lessons = Lesson::with(['category', 'tutor'])->get();
        return view('front-end.lessons', compact('lessons'));
    }

    public function showLesson($id)
    {
        // Fetch a single lesson by ID with its category and tutor
        $lesson = Lesson::with(['category', 'tutor'])->findOrFail($id);
        return view('front-end.lesson-show', compact('lesson'));
    }

}
