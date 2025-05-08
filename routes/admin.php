<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::middleware(['can:admin-access'])->group(function () {
    Volt::route('/admin/categories', 'admin.category.managecategory')
        ->name('admin.categories');
});
