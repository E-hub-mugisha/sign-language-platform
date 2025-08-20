<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lesson;
use App\Models\LessonCategory;
use App\Models\LessonReview;
use App\Models\User;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    public function index()
    {
        $lessons = Lesson::with(['category', 'tutor'])->paginate(10);
        return view('admin.lessons.index', compact('lessons'));
    }

    public function create()
    {
        $categories = LessonCategory::all();
        $tutors = User::where('role', 'teacher')->get();
        return view('admin.lessons.create', compact('categories', 'tutors'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'language' => 'required',
            'category_id' => 'nullable|exists:lesson_categories,id',
            'video_url' => 'required|url',
            'thumbnail_url' => 'nullable|url',
            'pdf_url' => 'nullable|url',
            'tutor_id' => 'nullable|exists:users,id',
        ]);

        Lesson::create($request->all());
        return redirect()->route('admin.lessons.index')->with('success', 'Lesson created successfully.');
    }

    public function edit($id)
    {
        $lesson = Lesson::findOrFail($id);
        $categories = LessonCategory::all();
        $tutors = User::where('role', 'teacher')->get();
        return view('admin.lessons.edit', compact('lesson', 'categories', 'tutors'));
    }

    public function update(Request $request, Lesson $lesson)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'language' => 'required',
            'category_id' => 'nullable|exists:lesson_categories,id',
            'video_url' => 'required|url',
            'thumbnail_url' => 'nullable|url',
            'pdf_url' => 'nullable|url',
            'tutor_id' => 'nullable|exists:users,id',
        ]);

        $lesson->update($request->all());
        return redirect()->route('admin.lessons.index')->with('success', 'Lesson updated successfully.');
    }

    public function destroy($id)
    {
        $lesson = Lesson::findOrFail($id);
        $lesson->delete();
        return redirect()->route('admin.lessons.index')->with('success', 'Lesson deleted successfully.');
    }

    public function categories()
    {
        $categories = LessonCategory::all();
        return view('admin.lessons.categories', compact('categories'));
    }

    public function storeCategory(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        LessonCategory::create($request->all());
        return redirect()->route('admin.lessonCategories.index')->with('success', 'Category created successfully.');
    }

    public function updateCategory(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $category = LessonCategory::findOrFail($id);
        $category->update($request->all());
        return redirect()->route('admin.lessonCategories.index')->with('success', 'Category updated successfully.');
    }

    public function destroyCategory($id)
    {
        $category = LessonCategory::findOrFail($id);
        $category->delete();
        return redirect()->route('admin.lessonCategories.index')->with('success', 'Category deleted successfully.');
    }

    public function lessonReviews()
    {
        $reviews = LessonReview::with(['lesson', 'user'])->paginate(10);
        return view('admin.lessons.reviews', compact('reviews'));
    }

    public function deleteReview($id)
    {
        $review = LessonReview::findOrFail($id);
        $review->delete();
        return redirect()->route('admin.lessons.reviews')->with('success', 'Review deleted successfully.');
    }
}
