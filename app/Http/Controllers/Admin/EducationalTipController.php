<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EducationTip;
use App\Models\LessonCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class EducationalTipController extends Controller
{
    public function index()
    {
        $tips = EducationTip::with(['user', 'category'])->latest()->get();
        $categories = LessonCategory::all();
        return view('admin.education-tips.index', compact('tips', 'categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category_id' => 'nullable|exists:lesson_categories,id',
            'image' => 'nullable|image|max:2048',
            'is_active' => 'required|boolean',
            'tag' => 'nullable|string|max:255',
        ]);

        $imagePath = $request->file('image') ? $request->file('image')->store('education-tips', 'public') : null;

        EducationTip::create([
            'title' => $request->title,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'image' => $imagePath,
            'is_active' => $request->is_active,
            'tag' => $request->tag,
            'slug' => Str::slug($request->title . '-' . time()),
            'user_id' => Auth::id(),
        ]);

        return redirect()->back()->with('success', 'Education tip created successfully.');
    }

    public function edit(EducationTip $educationTip)
    {
        $categories = LessonCategory::all();
        return view('admin.education-tips.edit', compact('educationTip', 'categories'));
    }

    public function update(Request $request, EducationTip $educationTip)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category_id' => 'nullable|exists:lesson_categories,id',
            'image' => 'nullable|image|max:2048',
            'is_active' => 'required|boolean',
            'tag' => 'nullable|string|max:255',
        ]);

        if ($request->hasFile('image')) {
            if ($educationTip->image) {
                Storage::disk('public')->delete($educationTip->image);
            }
            $educationTip->image = $request->file('image')->store('education-tips', 'public');
        }

        $educationTip->update([
            'title' => $request->title,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'is_active' => $request->is_active,
            'tag' => $request->tag,
            'slug' => Str::slug($request->title . '-' . time()),
        ]);

        return redirect()->back()->with('success', 'Education tip updated successfully.');
    }

    public function destroy(EducationTip $educationTip)
    {
        if ($educationTip->image) {
            Storage::disk('public')->delete($educationTip->image);
        }

        $educationTip->delete();

        return redirect()->back()->with('success', 'Education tip deleted successfully.');
    }
}
        