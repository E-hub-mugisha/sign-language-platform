<?php

namespace App\Http\Controllers;

use App\Models\EducationTip;
use App\Models\Lesson;
use App\Models\LessonCategory;
use App\Models\LessonEnrollment;
use App\Models\LessonReview;
use App\Models\Testimonial;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    //
    public function index()
    {
        // Fetch categories from the database
        $categories = LessonCategory::with(['lessons.tutor'])->get();
        $instructors = User::where('role', 'teacher')->get();
        $testimonials = Testimonial::where('active', true)->get();
        $educationalTips = EducationTip::where('is_active', true)->latest()->take(3)->get();
        return view('front-end.index', compact('categories', 'instructors', 'testimonials', 'educationalTips'));
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

    public function storeReview(Request $request)
    {
        $request->validate([
            'lesson_id' => 'required|exists:lessons,id',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string',
        ]);

        LessonReview::updateOrCreate(
            ['lesson_id' => $request->lesson_id, 'user_id' => auth()->id()],
            ['rating' => $request->rating, 'comment' => $request->comment]
        );

        return back()->with('success', 'Review submitted successfully.');
    }

    public function showLessonByCategory($id)
    {
        // Fetch lessons by category ID
        $category = LessonCategory::with(['lessons.tutor'])->findOrFail($id);
        return view('front-end.lesson-category-show', compact('category'));
    }

    public function showInstructors()
    {
        // Fetch all instructors
        $instructors = User::where('role', 'teacher')->get();
        return view('front-end.instructors', compact('instructors'));
    }

    public function showLessonAfterEnroll()
    {
        $userId = Auth::id();

        $lessons = Lesson::whereHas('enrollments', function ($query) use ($userId) {
            $query->where('user_id', $userId);
        })
            ->with(['category', 'tutor'])
            ->get();

        return view('front-end.lesson-after-enroll', compact('lessons'));
    }

    public function LessonAfterEnroll($lessonId)
    {
        $enrollment = LessonEnrollment::where('lesson_id', $lessonId)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        $lesson = Lesson::findOrFail($enrollment->lesson_id);
        return view('front-end.after-enroll', compact('lesson'));
    }

    public function enroll(Request $request, $lessonId)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Please login to enroll in a lesson.');
        }

        LessonEnrollment::firstOrCreate(
            [
                'lesson_id' => $lessonId,
                'user_id'   => Auth::id(),
            ],
            [
                'enrolled_at' => now(),
                'status' => 'active',
            ]
        );

        return redirect()->route('lesson.afterEnroll')
            ->with('success', 'You have successfully enrolled in this lesson!');
    }

    public function myEnrollments()
    {
        $enrollments = LessonEnrollment::with('lesson')
            ->where('user_id', Auth::id())
            ->get();

        return view('lessons.my_enrollments', compact('enrollments'));
    }

    public function cancel($id)
    {
        $enrollment = LessonEnrollment::where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        $enrollment->update(['status' => 'cancelled']);

        return redirect()->back()->with('success', 'Enrollment cancelled.');
    }

    public function contact()
    {
        return view('front-end.contact');
    }

    public function storeTestimonial(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'role' => 'nullable',
            'message' => 'required',
            'rating' => 'required',
            'photo' => 'nullable',
        ]);

        if ($request->hasFile('photo')) {
            $validated['photo'] = $request->file('photo')->store('testimonials', 'public');
        }

        Testimonial::create($validated);

        return redirect()->back()->with('success', 'Thank you for your feedback!');
    }

    // Show all active education tips
    public function indexEducationTip(Request $request)
    {
        $category_id = $request->query('category');

        $educationTips = EducationTip::with(['user', 'category'])
            ->where('is_active', 1)
            ->when($category_id, function ($query, $category_id) {
                $query->where('category_id', $category_id);
            })
            ->latest()
            ->paginate(10);

        $categories = LessonCategory::all();

        return view('front-end.educational-tips', compact('educationTips', 'categories', 'category_id'));
    }

    // Show single tip by slug
    public function showEducationTip($slug)
    {
        $tip = EducationTip::with(['user', 'category'])->where('slug', $slug)->firstOrFail();

        // increment views
        $tip->increment('views');

        return view('front-end.educational-show', compact('tip'));
    }
}
