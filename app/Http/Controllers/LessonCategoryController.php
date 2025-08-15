<?php

namespace App\Http\Controllers;

use App\Models\LessonCategory;
use Illuminate\Http\Request;

class LessonCategoryController extends Controller
{
    public function index()
    {
        $categories = LessonCategory::latest()->paginate(10);
        return view('lesson_categories.index', compact('categories'));
    }

    public function create()
    {
        return view('lesson_categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:lesson_categories,name',
        ]);

        LessonCategory::create($request->only('name'));

        return redirect()->route('lesson-categories.index')
            ->with('success', 'Lesson category created successfully.');
    }

    public function edit(LessonCategory $lessonCategory)
    {
        return view('lesson_categories.edit', compact('lessonCategory'));
    }

    public function update(Request $request, LessonCategory $lessonCategory)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:lesson_categories,name,' . $lessonCategory->id,
        ]);

        $lessonCategory->update($request->only('name'));

        return redirect()->route('lesson-categories.index')
            ->with('success', 'Lesson category updated successfully.');
    }

    public function destroy(LessonCategory $lessonCategory)
    {
        $lessonCategory->delete();

        return redirect()->route('lesson-categories.index')
            ->with('success', 'Lesson category deleted successfully.');
    }
}
