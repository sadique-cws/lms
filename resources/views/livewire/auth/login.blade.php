<?php

use function Livewire\Volt\{state, rules};
use Illuminate\Support\Facades\Auth;

state([
    'email' => '',
    'password' => '',
    'remember' => false
]);

rules([
    'email' => 'required|email',
    'password' => 'required'
]);

$login = function() {
    $this->validate();

    if (Auth::attempt(['email' => $this->email, 'password' => $this->password], $this->remember)) {
        session()->regenerate();
        
        // Redirect to the main dashboard route which will then redirect based on role
        return redirect()->route('dashboard');
    }

    $this->addError('email', 'The provided credentials do not match our records.');
};

?>

<div class="min-h-screen flex items-center justify-center bg-gradient-to-r from-gray-50 to-gray-100 py-6 px-4 sm:px-6 lg:px-8">
    <div class="max-w-lg w-full space-y-8 bg-white p-6 md:p-8 rounded-xl shadow-lg">
        <div class="text-center">
            <h2 class="mt-4 text-2xl md:text-3xl font-extrabold text-gray-900">
                Sign in to your account
            </h2>
            <p class="mt-2 text-sm text-gray-600">
                Or
                <a href="{{ route('register') }}" class="font-medium text-indigo-600 hover:text-indigo-500 transition-colors duration-200">
                    create a new account
                </a>
            </p>
        </div>

        <form wire:submit="login" class="mt-8 space-y-6">
            <div class="space-y-5">
                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email address</label>
                    <input wire:model="email" id="email" type="email" 
                        class="appearance-none rounded-lg relative block w-full px-3 py-2.5 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm transition-colors duration-200"
                        placeholder="Enter your email">
                    @error('email') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                    <input wire:model="password" id="password" type="password"
                        class="appearance-none rounded-lg relative block w-full px-3 py-2.5 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm transition-colors duration-200"
                        placeholder="Enter your password">
                    @error('password') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="flex items-center justify-between mt-4">
                <div class="flex items-center">
                    <input wire:model="remember" id="remember" type="checkbox" 
                        class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded transition-colors duration-200">
                    <label for="remember" class="ml-2 block text-sm text-gray-700">
                        Remember me
                    </label>
                </div>
            </div>

            <div class="mt-6">
                <button type="submit" 
                    class="group relative w-full flex justify-center py-2.5 px-4 border border-transparent text-sm font-medium rounded-lg text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors duration-200">
                    Sign in
                </button>
            </div>
        </form>
    </div>
</div>
