<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        \Log::info('AuthServiceProvider booted');
        Gate::define('admin-access', fn(User $user) => $user->role === 'admin');
        Gate::define('student-access', fn(User $user) => $user->role === 'student');
        Gate::define('instructor-access', fn(User $user) => $user->role === 'instructor');
        Gate::define('view-students', function (User $user) {
            return $user->role === 'admin';
        });

    }
}
