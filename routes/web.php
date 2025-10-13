<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\EducationalTipController;
use App\Http\Controllers\Admin\LessonCategoryController;
use App\Http\Controllers\Admin\LessonController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// ------------------------
// Public Routes
// ------------------------
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/lessons', [HomeController::class, 'lessons'])->name('lessons.index');
Route::get('/lessons/{id}', [HomeController::class, 'showLesson'])->name('lessons.show');
Route::get('/lessons/category/{id}', [HomeController::class, 'showLessonByCategory'])->name('lessons.category');
Route::get('/instructors', [HomeController::class, 'showInstructors'])->name('home.instructors');
Route::get('/contact', [HomeController::class, 'contact'])->name('home.contact');
Route::get('/educational/tips', [HomeController::class, 'indexEducationTip'])->name('home.educationalTips');
Route::get('/educational/tips/{slug}', [HomeController::class, 'showEducationTip'])->name('home.educationalTips.show');

// Authenticated routes (all roles)
Route::middleware(['auth'])->group(function () {

    // ------------------------
    // Profile
    // ------------------------
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // ------------------------
    // Lesson Enrollment
    // ------------------------
    Route::get('/lesson-after-enroll', [HomeController::class, 'showLessonAfterEnroll'])->name('lesson.afterEnroll');
    Route::get('/lessons/{id}/enrolled', [HomeController::class, 'LessonAfterEnroll'])->name('lessons.enrolled');
    Route::post('/lessons/{id}/enroll', [HomeController::class, 'enroll'])->name('lessons.enroll');
    Route::get('/my-enrollments', [HomeController::class, 'myEnrollments'])->name('lessons.myEnrollments');
    Route::post('/enrollment/{id}/cancel', [HomeController::class, 'cancel'])->name('lessons.cancel');
    Route::post('/lesson-reviews', [HomeController::class, 'storeReview'])->name('lesson-reviews.store');
    Route::post('/testimonials/user', [HomeController::class, 'storeTestimonial'])->name('front-testimonials.store');

    // ------------------------
    // Admin Routes
    // ------------------------
    Route::middleware(['role:admin'])->prefix('admin')->group(function () {

        // Dashboard
        Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');

        // User Management
        Route::resource('users', UserController::class)->except(['show', 'edit', 'create']);
        Route::patch('users/{id}/status', [UserController::class, 'toggleStatus'])->name('users.status');
        Route::post('users/{user}/resend-verification', [UserController::class, 'resendVerification'])
            ->name('users.resendVerification');

        // Instructors
        Route::get('instructors', [UserController::class, 'instructors'])->name('admin.instructors.index');
        Route::post('instructors', [UserController::class, 'storeInstructor'])->name('admin.instructors.store');
        Route::put('instructors/{id}', [UserController::class, 'updateInstructor'])->name('admin.instructors.update');
        Route::delete('instructors/{id}', [UserController::class, 'destroyInstructor'])->name('admin.instructors.destroy');
        Route::patch('instructors/{id}/status', [UserController::class, 'toggleInstructorStatus'])->name('admin.instructors.status');
        Route::post('instructors/{id}/verify', [UserController::class, 'verifyInstructor'])->name('admin.instructors.verify');

        // Lessons
        Route::resource('lessons', LessonController::class);
        Route::resource('lesson-categories', LessonCategoryController::class)->only(['index','store','update','destroy']);
        Route::get('lesson-reviews', [LessonController::class, 'lessonReviews'])->name('lessons.reviews');
        Route::delete('lesson-reviews/{id}', [LessonController::class, 'deleteReview'])->name('lessons.reviews.delete');

        // Testimonials
        Route::resource('testimonials', TestimonialController::class);
        Route::patch('testimonials/{id}/status', [TestimonialController::class, 'toggleStatus'])->name('testimonials.status');

        // Partners
        Route::get('partners', [AdminController::class, 'partners'])->name('partners.index');
        Route::post('partners', [AdminController::class, 'storePartner'])->name('partners.store');
        Route::put('partners/{id}', [AdminController::class, 'updatePartner'])->name('partners.update');
        Route::delete('partners/{id}', [AdminController::class, 'destroyPartner'])->name('partners.destroy');

        // Educational Tips
        Route::resource('education-tips', EducationalTipController::class);
    });

    // ------------------------
    // Teacher Routes
    // ------------------------
    Route::middleware(['role:teacher'])->prefix('teacher')->group(function () {
        Route::get('/lessons', [LessonController::class, 'index'])->name('teacher.lessons.index');
        Route::get('/lessons/{id}/show', [LessonController::class, 'show'])->name('teacher.lessons.show');
        Route::get('/education-tips', [EducationalTipController::class, 'index'])->name('teacher.education-tips.index');
    });

    // ------------------------
    // Student Routes
    // ------------------------
    Route::middleware(['role:student'])->prefix('student')->group(function () {
        Route::get('/lessons', [LessonController::class, 'index'])->name('student.lessons.index');
        Route::get('/lessons/{id}/show', [LessonController::class, 'show'])->name('student.lessons.show');
        Route::get('/education-tips', [EducationalTipController::class, 'index'])->name('student.education-tips.index');
    });
});

require __DIR__ . '/auth.php';
