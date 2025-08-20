<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role' => 'required',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        return redirect()->route('users.index')->with('success', 'User created successfully!');
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
            'role' => 'required|in:admin,teacher,student,parent',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;

        if ($request->password) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('users.index')->with('success', 'User updated successfully!');
    }
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User deleted successfully!');
    }

    public function toggleStatus($id)
    {
        $user = User::findOrFail($id);
        $user->is_active = !$user->is_active;
        $user->save();
        return redirect()->route('users.index')->with('success', 'User status updated.');
    }

    // UserController.php

    public function resendVerification(User $user)
    {
        if ($user->hasVerifiedEmail()) {
            return back()->with('error', 'This user is already verified.');
        }

        $user->sendEmailVerificationNotification();

        return back()->with('success', 'Verification email has been resent successfully.');
    }

    public function instructors()
    {
        $instructors = User::where('role', 'teacher')->get();
        return view('users.instructors', compact('instructors'));
    }

    public function storeInstructor(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'teacher',
        ]);

        return redirect()->route('admin.instructors.index')->with('success', 'Instructor created successfully.');
    }

    public function updateInstructor(Request $request, $id)
    {
        $instructor = User::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $instructor->id,
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $instructor->name = $request->name;
        $instructor->email = $request->email;

        if ($request->password) {
            $instructor->password = Hash::make($request->password);
        }

        $instructor->save();

        return redirect()->route('admin.instructors.index')->with('success', 'Instructor updated successfully.');
    }

    public function destroyInstructor($id)
    {
        $instructor = User::findOrFail($id);
        $instructor->delete();

        return redirect()->route('admin.instructors.index')->with('success', 'Instructor deleted successfully.');
    }

    public function showInstructor($id)
    {
        $instructor = User::findOrFail($id);
        return view('users.instructor', compact('instructor'));
    }

    public function activateInstructor($id)
    {
        $instructor = User::findOrFail($id);
        $instructor->is_active = true;
        $instructor->save();

        return redirect()->route('admin.instructors.index')->with('success', 'Instructor activated successfully.');
    }

    public function verifyInstructor($id)
    {
        $instructor = User::findOrFail($id);
        if ($instructor->hasVerifiedEmail()) {
            return back()->with('error', 'This instructor is already verified.');
        }

        $instructor->sendEmailVerificationNotification();

        return back()->with('success', 'Verification email has been resent successfully.');
    }
}
