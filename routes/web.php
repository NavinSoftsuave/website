<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CheckoutController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth'])->group(function () {
    // Profile Routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Course Routes
    Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');
    Route::get('/courses/allcourses', [CourseController::class, 'allcourses'])->name('courses.allcourses');
    Route::get('/courses/category/{slug}', [CourseController::class, 'category'])->name('courses.category');

    // ✅ Corrected route
    Route::get('/courses/my-courses', [CourseController::class, 'myCourses'])->name('courses.mycourses');
    Route::delete('/courses/unsubscribe/{course}', [CourseController::class, 'unsubscribe'])->name('courses.unsubscribe');

    // Course detail route (after "my-courses")
    Route::get('/courses/{id}', [CourseController::class, 'show'])->name('courses.show');

    // Checkout & Payment
    Route::get('/checkout/{course}', [CheckoutController::class, 'index'])->name('checkout');
    Route::get('/payment/success/{courseId}', [CheckoutController::class, 'success'])->name('payment.success');
    Route::get('/payment/cancel', [CheckoutController::class, 'cancel'])->name('payment.cancel');
    Route::get('/courses/watch/{id}', [CourseController::class, 'watch'])->name('courses.watch');

});

require __DIR__.'/auth.php';
