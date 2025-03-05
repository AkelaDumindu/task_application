<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Task Manager Application') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900 flex">

        <!-- Sidebar -->
        {{-- <aside id="sidebar" class="w-64 bg-gray-800 text-white min-h-screen p-5 transition-transform duration-300">
            <div class="flex justify-between items-center mb-5">

                <div class="text-lg font-semibold">
                    <a href="#" class="hover:text-gray-300 text-[32px]">Task Manager Application</a>
                </div>
            </div>
            <ul class="space-y-5 side-nav-names">
                <li>
                    <a href="{{ route('dashboard')}}" class="flex items-center space-x-3 p-2 hover:bg-gray-700 rounded">
                        <i class="lni lni-home"></i>
                        <span>Home</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('add') }}" class="flex items-center space-x-3 p-2 hover:bg-gray-700 rounded">
                        <i class="lni lni-home"></i>
                        <span>Add New Task</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('') }}" class="flex items-center space-x-3 p-2 hover:bg-gray-700 rounded">
                        <i class="lni lni-home"></i>
                        <span>All Tasks</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="flex items-center space-x-3 p-2 hover:bg-gray-700 rounded">
                        <i class="lni lni-plus"></i>
                        <span>Important Task</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="flex items-center space-x-3 p-2 hover:bg-gray-700 rounded">
                        <i class="lni lni-direction"></i>
                        <span>Completed Task</span>
                    </a>
                </li>
            </ul>
        </aside> --}}

        <!-- Main Content -->
        <div class="flex-1">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main class="p-6">
                {{ $slot }}
            </main>
        </div>

    </div>

    <!-- Sidebar Toggle Script -->

    <script>
        const sidebar = document.getElementById('sidebar');
        const toggleBtn = document.getElementById('toggle-btn');

        toggleBtn.addEventListener('click', () => {
            sidebar.classList.toggle('-translate-x-full');
        });
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>


</body>

</html>