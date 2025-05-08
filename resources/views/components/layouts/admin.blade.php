<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-gray-50">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title }} | Admin Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="h-full">
    <div class="min-h-screen">
        <!-- Include sidebar -->
        @include('components.include.sidebar')
        
        <!-- Main Content -->
        <div class="lg:pl-64">
            <!-- Page Heading -->
            <header class="bg-white shadow-sm">
                <div class="p-4 sm:px-6">
                    <h1 class="text-2xl font-semibold text-gray-900">
                        {{ $title ?? 'Dashboard' }}
                    </h1>
                </div>
            </header>

            <!-- Page Content -->
            <main class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
                {{ $slot }}
            </main>
        </div>
    </div>
</body>
</html>
