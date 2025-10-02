<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lesson;
use App\Models\LessonCategory;
use App\Models\LessonReview;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
            'title'         => 'required|string|max:255',
            'language'      => 'required',
            'category_id'   => 'nullable|exists:lesson_categories,id',
            'video_url'     => 'required|file|mimes:mp4,mov,avi,wmv|max:51200', // 50MB
            'thumbnail_url' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'pdf_url'       => 'nullable|file|mimes:pdf|max:10240',
            'tutor_id'      => 'nullable|exists:users,id',
        ]);

        $data = $request->only(['title', 'description', 'language', 'category_id', 'tutor_id', 'is_active']);

        // Upload files
        if ($request->hasFile('video_url')) {
            $data['video_url'] = $request->file('video_url')->store('lessons/videos', 'public');
        }

        if ($request->hasFile('thumbnail_url')) {
            $data['thumbnail_url'] = $request->file('thumbnail_url')->store('lessons/thumbnails', 'public');
        }

        if ($request->hasFile('pdf_url')) {
            $data['pdf_url'] = $request->file('pdf_url')->store('lessons/pdfs', 'public');
        }

        Lesson::create($data);

        return redirect()->route('admin.lessons.index')->with('success', 'Lesson created successfully.');
    }

    public function show($id)
    {
        $lesson = Lesson::with(['category', 'tutor'])->findOrFail($id);
        return view('admin.lessons.show', compact('lesson'));
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
            'title'         => 'required|string|max:255',
            'language'      => 'required',
            'category_id'   => 'nullable|exists:lesson_categories,id',
            'video_url'     => 'nullable|file|mimes:mp4,mov,avi,wmv|max:51200',
            'thumbnail_url' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'pdf_url'       => 'nullable|file|mimes:pdf|max:10240',
            'tutor_id'      => 'nullable|exists:users,id',
        ]);

        $data = $request->only(['title', 'description', 'language', 'category_id', 'tutor_id', 'is_active']);

        // Upload new files if provided, keep old otherwise
        if ($request->hasFile('video_url')) {
            if ($lesson->video_url && Storage::disk('public')->exists($lesson->video_url)) {
                Storage::disk('public')->delete($lesson->video_url);
            }
            $data['video_url'] = $request->file('video_url')->store('lessons/videos', 'public');
        }

        if ($request->hasFile('thumbnail_url')) {
            if ($lesson->thumbnail_url && Storage::disk('public')->exists($lesson->thumbnail_url)) {
                Storage::disk('public')->delete($lesson->thumbnail_url);
            }
            $data['thumbnail_url'] = $request->file('thumbnail_url')->store('lessons/thumbnails', 'public');
        }

        if ($request->hasFile('pdf_url')) {
            if ($lesson->pdf_url && Storage::disk('public')->exists($lesson->pdf_url)) {
                Storage::disk('public')->delete($lesson->pdf_url);
            }
            $data['pdf_url'] = $request->file('pdf_url')->store('lessons/pdfs', 'public');
        }

        $lesson->update($data);

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
