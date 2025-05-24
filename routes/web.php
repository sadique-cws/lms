<?php

use App\Livewire\Public\Landingpage;
use App\Livewire\Admin\Dashboard as AdminDashboard;
use App\Livewire\Instructor\Dashboard as InstructorDashboard;
use App\Livewire\Student\Dashboard as StudentDashboard;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::get('/',Landingpage::class)->name('landing');

Route::middleware(['auth'])->group(function () {
    // Main dashboard route that redirects based on role
    Route::get('/dashboard', function () {
        return match(auth()->user()->role) {
            'admin' => redirect()->route('admin.dashboard'),
            'instructor' => redirect()->route('instructor.dashboard'),
            default => redirect()->route('student.dashboard'),
        };
    })->name('dashboard');

    // Admin routes
    Route::middleware(['can:admin-access'])->group(function () {
        Route::get('/admin/dashboard', AdminDashboard::class)->name('admin.dashboard');
        require __DIR__.'/admin.php';
    });

    // Instructor routes
    Route::middleware(['can:instructor-access'])->group(function () {
        Route::get('/instructor/dashboard', InstructorDashboard::class)->name('instructor.dashboard');
    });

    // Student routes
    Route::middleware(['can:student-access'])->group(function () {
        Route::get('/student/dashboard', StudentDashboard::class)->name('student.dashboard');
    });

   
});

require __DIR__.'/auth.php';
