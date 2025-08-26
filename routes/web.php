<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\EducationalTipController;
use App\Http\Controllers\Admin\EducationTipController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\LessonController;
use App\Http\Controllers\Admin\TestimonialController;

// Public routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/lessons', [HomeController::class, 'lessons'])->name('lessons.index');
Route::get('/lessons/{id}', [HomeController::class, 'showLesson'])->name('lessons.show');
Route::get('/lessons/category/{id}', [HomeController::class, 'showLessonByCategory'])->name('lessons.category');
Route::post('/lesson-reviews', [HomeController::class, 'storeReview'])->name('lesson-reviews.store')->middleware('auth');
Route::post('/testimonials/user', [HomeController::class, 'storeTestimonial'])->name('front-testimonials.store');

Route::get('/instructors', [HomeController::class, 'showInstructors'])->name('home.instructors');

Route::get('/contact', [HomeController::class, 'contact'])->name('home.contact');

Route::get('/educational/tips', [HomeController::class, 'indexEducationTip'])->name('home.educationalTips');
Route::get('/educational/tips/{slug}', [HomeController::class, 'showEducationTip'])->name('home.educationalTips.show');

// Dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Authenticated routes
Route::middleware(['auth'])->group(function () {
    // Profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // User Management (admin-only)
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
    Route::patch('/users/{id}/status', [UserController::class, 'toggleStatus'])->name('users.status');
    Route::post('/users/{user}/resend-verification', [UserController::class, 'resendVerification'])
    ->name('users.resendVerification');

    Route::get('/lesson-after-enroll', [HomeController::class, 'showLessonAfterEnroll'])->name('lesson.afterEnroll');
    Route::get('/lessons/{id}/enrolled', [HomeController::class, 'LessonAfterEnroll'])->name('lessons.enrolled');
    Route::post('/lessons/{id}/enroll', [HomeController::class, 'enroll'])->name('lessons.enroll');
    Route::get('/my-enrollments', [HomeController::class, 'myEnrollments'])->name('lessons.myEnrollments');
    Route::post('/enrollment/{id}/cancel', [HomeController::class, 'cancel'])->name('lessons.cancel');

    // admin lessons
    Route::get('/admin/lessons', [LessonController::class, 'index'])->name('admin.lessons.index');
    Route::get('/admin/lessons/create', [LessonController::class, 'create'])->name('admin.lessons.create');
    Route::get('/admin/lessons/show/{id}', [LessonController::class, 'show'])->name('admin.lessons.show');
    Route::post('/admin/lessons', [LessonController::class, 'store'])->name('admin.lessons.store');
    Route::get('/admin/lessons/{id}/edit', [LessonController::class, 'edit'])->name('admin.lessons.edit');
    Route::put('/admin/lessons/{id}', [LessonController::class, 'update'])->name('admin.lessons.update');
    Route::delete('/admin/lessons/{id}', [LessonController::class, 'destroy'])->name('admin.lessons.destroy');
    Route::get('/admin/lessons/{id}', [LessonController::class, 'show'])->name('admin.lessons.show');

    Route::get('/admin/instructors', [UserController::class, 'instructors'])->name('admin.instructors.index');
    Route::post('/admin/instructors', [UserController::class, 'storeInstructor'])->name('admin.instructors.store');
    Route::put('/admin/instructors/{id}', [UserController::class, 'updateInstructor'])->name('admin.instructors.update');
    Route::delete('/admin/instructors/{id}', [UserController::class, 'destroyInstructor'])->name('admin.instructors.destroy');
    Route::patch('/admin/instructors/{id}/status', [UserController::class, 'toggleInstructorStatus'])->name('admin.instructors.status');
    Route::post('/admin/instructors/{id}/verify', [UserController::class, 'verifyInstructor'])->name('admin.instructors.verify');

    Route::get('/admin/lesson-categories', [LessonController::class, 'categories'])->name('admin.lessonCategories.index');
    Route::post('/admin/lesson-categories', [LessonController::class, 'storeCategory'])->name('admin.lessonCategories.store');
    Route::put('/admin/lesson-categories/{id}', [LessonController::class, 'updateCategory'])->name('admin.lessonCategories.update');
    Route::delete('/admin/lesson-categories/{id}', [LessonController::class, 'destroyCategory'])->name('admin.lessonCategories.destroy');

    Route::get('/admin/lesson-reviews', [LessonController::class, 'lessonReviews'])->name('admin.lessons.reviews');
    Route::delete('/admin/lesson-reviews/{id}', [LessonController::class, 'deleteReview'])->name('admin.lessons.reviews.delete');

    Route::get('/admin/testimonials', [TestimonialController::class, 'index'])->name('admin.testimonials.index');
    Route::post('/admin/testimonials', [TestimonialController::class, 'store'])->name('admin.testimonials.store');
    Route::put('/admin/testimonials/{id}', [TestimonialController::class, 'update'])->name('admin.testimonials.update');
    Route::delete('/admin/testimonials/{id}', [TestimonialController::class, 'destroy'])->name('admin.testimonials.destroy');
    Route::patch('/admin/testimonials/{id}/status', [TestimonialController::class, 'toggleStatus'])->name('admin.testimonials.status');

    Route::get('/admin/partners', [AdminController::class, 'partners'])->name('admin.partners.index');
    Route::post('/admin/partners', [AdminController::class, 'storePartner'])->name('admin.partners.store');
    Route::put('/admin/partners/{id}', [AdminController::class, 'updatePartner'])->name('admin.partners.update');
    Route::delete('/admin/partners/{id}', [AdminController::class, 'destroyPartner'])->name('admin.partners.destroy');

    Route::get('/admin/education-tips', [EducationalTipController::class, 'index'])->name('admin.education-tips.index');
    Route::post('/admin/education-tips', [EducationalTipController::class, 'store'])->name('admin.education-tips.store');
    Route::get('/admin/education-tips/{educationTip}/edit', [EducationalTipController::class, 'edit'])->name('admin.education-tips.edit');
    Route::put('/admin/education-tips/{educationTip}', [EducationalTipController::class, 'update'])->name('admin.education-tips.update');
    Route::delete('/admin/education-tips/{educationTip}', [EducationalTipController::class, 'destroy'])->name('admin.education-tips.destroy');
});

require __DIR__ . '/auth.php';
