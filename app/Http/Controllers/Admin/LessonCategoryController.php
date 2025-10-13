<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LessonCategory;
use Illuminate\Http\Request;

class LessonCategoryController extends Controller
{
    public function index()
    {
        $categories = LessonCategory::all();
        return view('admin.lessons.categories', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        LessonCategory::create($request->all());
        return redirect()->route('lesson-categories.index')->with('success', 'Category created successfully.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $category = LessonCategory::findOrFail($id);
        $category->update($request->all());
        return redirect()->route('lesson-categories.index')->with('success', 'Category updated successfully.');
    }

    public function destroy($id)
    {
        $category = LessonCategory::findOrFail($id);
        $category->delete();
        return redirect()->route('lesson-categories.index')->with('success', 'Category deleted successfully.');
    }
}
