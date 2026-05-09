<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - PPID</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/lucide@latest"></script>
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-gray-50 flex h-screen overflow-hidden text-gray-800">

    <!-- Sidebar -->
    <aside class="w-64 bg-gray-100 border-r border-gray-200 flex flex-col hidden md:flex">
        <!-- User Info -->
        <div class="p-6 border-b border-gray-200 flex items-center gap-3">
            <img src="https://ui-avatars.com/api/?name=Admin+Portal&background=0D8ABC&color=fff" alt="Admin" class="w-10 h-10 rounded-full">
            <div>
                <h3 class="font-bold text-brand-green text-sm">Admin Portal</h3>
                <p class="text-xs text-gray-500">Sumenep Management</p>
            </div>
        </div>

        <!-- Action Button -->
        <div class="p-4">
            <button class="w-full bg-brand-dark hover:bg-green-900 text-white py-2 rounded-md font-medium text-sm flex items-center justify-center gap-2 transition shadow-sm">
                <i data-lucide="plus" class="w-4 h-4"></i> New Post
            </button>
        </div>

        <!-- Nav Links -->
        <nav class="flex-1 px-4 space-y-1">
            <a href="{{ route('admin.dashboard') }}" class="bg-brand-green text-white flex items-center gap-3 px-3 py-2 rounded-md text-sm font-medium">
                <i data-lucide="layout-dashboard" class="w-4 h-4"></i> Dashboard
            </a>
            <a href="#" class="text-gray-600 hover:bg-gray-200 hover:text-gray-900 flex items-center gap-3 px-3 py-2 rounded-md text-sm font-medium transition">
                <i data-lucide="file-text" class="w-4 h-4"></i> Manage News
            </a>
            <a href="#" class="text-gray-600 hover:bg-gray-200 hover:text-gray-900 flex items-center gap-3 px-3 py-2 rounded-md text-sm font-medium transition">
                <i data-lucide="folder" class="w-4 h-4"></i> Documents
            </a>
            <a href="#" class="text-gray-600 hover:bg-gray-200 hover:text-gray-900 flex items-center gap-3 px-3 py-2 rounded-md text-sm font-medium transition">
                <i data-lucide="mail" class="w-4 h-4"></i> Information Requests
            </a>
            <a href="#" class="text-gray-600 hover:bg-gray-200 hover:text-gray-900 flex items-center gap-3 px-3 py-2 rounded-md text-sm font-medium transition mt-4">
                <i data-lucide="settings" class="w-4 h-4"></i> Settings
            </a>
        </nav>
        
        <div class="p-4 border-t border-gray-200">
             <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="w-full text-left text-gray-600 hover:text-red-600 flex items-center gap-3 px-3 py-2 text-sm font-medium transition">
                    <i data-lucide="log-out" class="w-4 h-4"></i> Logout
                </button>
            </form>
        </div>
    </aside>

    <!-- Main Content -->
    <div class="flex-1 flex flex-col min-w-0 overflow-hidden">
        <!-- Topbar -->
        <header class="bg-white border-b border-gray-200 py-4 px-6 flex justify-between items-center">
            <div class="flex items-center gap-4">
                <button class="md:hidden text-gray-500 hover:text-gray-700">
                    <i data-lucide="menu" class="w-6 h-6"></i>
                </button>
                <h1 class="text-xl font-bold text-brand-dark">@yield('title', 'Dashboard Overview')</h1>
            </div>
            
            <div class="flex items-center gap-4">
                <button class="text-gray-500 hover:text-gray-700 relative">
                    <i data-lucide="bell" class="w-5 h-5"></i>
                    <span class="absolute top-0 right-0 block h-2 w-2 rounded-full bg-red-500 ring-2 ring-white"></span>
                </button>
                <button class="text-gray-500 hover:text-gray-700">
                    <i data-lucide="user-circle" class="w-6 h-6"></i>
                </button>
            </div>
        </header>

        <!-- Main -->
        <main class="flex-1 overflow-y-auto p-6 bg-white">
            @yield('content')
        </main>
    </div>

    <script>
        lucide.createIcons();
    </script>
</body>
</html>
