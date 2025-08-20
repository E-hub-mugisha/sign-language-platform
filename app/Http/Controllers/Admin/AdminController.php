<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function index()
    {
        // This method can be used to show the admin dashboard or any other admin-related view
        return view('admin.dashboard');
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
