<?php

use function Livewire\Volt\{state, rules, title, layout};
use App\Models\Category;
use Illuminate\Support\Str;

state([
    'categories' => fn() => Category::latest()->get(),
    'name' => '',
    'description' => '',
    'editingId' => null,
    'isEditing' => false
]);
title('Manage Categories');
layout('components.layouts.admin');
rules([
    'name' => 'required|min:3',
    'description' => 'required|min:10'
]);

$save = function() {
    $this->validate();
    
    if($this->isEditing) {
        Category::find($this->editingId)->update([
            'name' => $this->name,
            'slug' => Str::slug($this->name),
            'description' => $this->description
        ]);
        $this->isEditing = false;
    } else {
        Category::create([
            'name' => $this->name,
            'slug' => Str::slug($this->name),
            'description' => $this->description
        ]);
    }
    
    $this->reset(['name', 'description', 'editingId']);
    $this->categories = Category::latest()->get();
};

$edit = function(Category $category) {
    $this->name = $category->name;
    $this->description = $category->description;
    $this->editingId = $category->id;
    $this->isEditing = true;
};

$delete = function(Category $category) {
    $category->delete();
    $this->categories = Category::latest()->get();
};

$cancelEdit = function() {
    $this->reset(['name', 'description', 'editingId', 'isEditing']);
};

?>

<div class="p-6">
    <div class="max-w-4xl mx-auto">
        <div class="bg-white rounded-lg shadow-md p-6 mb-6">
            <h2 class="text-2xl font-bold mb-4">{{ $isEditing ? 'Edit Category' : 'Add New Category' }}</h2>
            
            <form wire:submit="save" class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700">Name</label>
                    <input type="text" wire:model="name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    @error('name') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Description</label>
                    <textarea wire:model="description" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"></textarea>
                    @error('description') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>

                <div class="flex space-x-2">
                    <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700">
                        {{ $isEditing ? 'Update' : 'Save' }}
                    </button>
                    @if($isEditing)
                    <button type="button" wire:click="cancelEdit" class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600">
                        Cancel
                    </button>
                    @endif
                </div>
            </form>
        </div>

        <div class="bg-white rounded-lg shadow-md p-6">
            <h2 class="text-2xl font-bold mb-4">Categories</h2>
            
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead>
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Name</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Description</th>
                            <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach($categories as $category)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $category->name }}</td>
                            <td class="px-6 py-4">{{ $category->description }}</td>
                            <td class="px-6 py-4 text-right text-sm font-medium">
                                <button wire:click="edit({{ $category->id }})" class="text-indigo-600 hover:text-indigo-900">Edit</button>
                                <button wire:click="delete({{ $category->id }})" class="ml-3 text-red-600 hover:text-red-900">Delete</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
