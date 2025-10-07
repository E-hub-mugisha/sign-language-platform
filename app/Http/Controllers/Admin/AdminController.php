<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EducationTip;
use App\Models\Lesson;
use App\Models\LessonCategory;
use App\Models\Partner;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function index()
    {
        $totalLessons = Lesson::count();
        $activeTips = EducationTip::where('is_active', true)->count();
        $inactiveTips = EducationTip::where('is_active', false)->count();
        $totalViews = EducationTip::sum('views');

        $categoriesCount = LessonCategory::count();
        $usersCount = User::count();
        $topTips = EducationTip::orderBy('views', 'desc')->take(5)->get();

        // Example data for chart (you can customize)
        $months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'];
        $userData = [10, 20, 15, 30, 25, 40];
        $lessonData = [5, 10, 8, 12, 20, 15];

        return view('dashboard', compact(
            'totalLessons',
            'activeTips',
            'inactiveTips',
            'totalViews',
            'categoriesCount',
            'usersCount',
            'topTips',
            'months',
            'userData',
            'lessonData'
        ));
    }


    public function partners()
    {
        // This method can be used to show the partners management view
        $partners = Partner::all();
        return view('admin.partners.index', compact('partners'));
    }

    public function storePartner(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'website' => 'nullable|url|max:255',
            'is_active' => 'boolean',
        ]);

        $partner = Partner::create($validatedData);

        return redirect()->route('admin.partners.index')->with('success', 'Partner created successfully.');
    }

    public function updatePartner(Request $request, $id)
    {
        $partner = Partner::findOrFail($id);

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'website' => 'nullable|url|max:255',
            'is_active' => 'boolean',
        ]);

        if ($request->hasFile('logo')) {
            // Handle file upload logic here if needed
        }

        $partner->update($validatedData);

        return redirect()->route('admin.partners.index')->with('success', 'Partner updated successfully.');
    }

    public function destroyPartner($id)
    {
        $partner = Partner::findOrFail($id);
        $partner->delete();

        return redirect()->route('admin.partners.index')->with('success', 'Partner deleted successfully.');
    }
}
