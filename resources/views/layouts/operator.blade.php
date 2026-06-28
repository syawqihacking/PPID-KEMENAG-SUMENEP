<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Operator CS - PPID</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/lucide@latest"></script>
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-gray-50 flex h-screen overflow-hidden text-gray-800">

    <!-- Mobile Sidebar Overlay -->
    <div id="sidebar-overlay" class="fixed inset-0 bg-gray-900/50 z-40 hidden md:hidden transition-opacity duration-300 opacity-0"></div>

    <!-- Sidebar -->
    <aside id="admin-sidebar" class="fixed inset-y-0 left-0 w-64 bg-gray-100 border-r border-gray-200 flex flex-col z-50 transform -translate-x-full md:relative md:translate-x-0 transition-transform duration-300 ease-in-out">
        <!-- User Info -->
        <div class="p-6 border-b border-gray-200 flex items-center justify-between">
            <div class="flex items-center gap-3">
                <img src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name) }}&background=2563EB&color=fff" alt="Operator" class="w-10 h-10 rounded-full">
                <div>
                    <h3 class="font-bold text-blue-600 text-sm">{{ auth()->user()->name }}</h3>
                    <span class="text-[10px] font-bold uppercase tracking-wider px-1.5 py-0.5 rounded bg-blue-100 text-blue-700">Operator CS</span>
                </div>
            </div>
            <button id="close-sidebar" class="md:hidden text-gray-400 hover:text-gray-600">
                <i data-lucide="x" class="w-6 h-6"></i>
            </button>
        </div>

        <!-- Nav Links -->
        <nav class="p-4 space-y-1 flex-grow overflow-y-auto">
            <div class="pb-2">
                <p class="px-3 text-xs font-semibold text-gray-400 uppercase tracking-wider">Live Chat</p>
            </div>
            <a href="{{ route('operator.livechat.index') }}" class="{{ request()->routeIs('operator.livechat.*') ? 'bg-blue-600 text-white' : 'text-gray-600 hover:bg-gray-200 hover:text-gray-900' }} flex items-center gap-3 px-3 py-2 rounded-md text-sm font-medium transition">
                <i data-lucide="message-square-dashed" class="w-4 h-4"></i> Antrean Chat
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
        <header class="bg-white border-b border-gray-200 py-4 px-4 md:px-6 flex justify-between items-center z-30">
            <div class="flex items-center gap-4">
                <button id="toggle-sidebar" class="md:hidden text-gray-500 hover:text-gray-700">
                    <i data-lucide="menu" class="w-6 h-6"></i>
                </button>
                <h1 class="text-lg md:text-xl font-bold text-gray-900 truncate">@yield('title', 'Live Chat CS')</h1>
            </div>
            
            <div class="flex items-center gap-3">
                <span class="text-xs text-gray-500 hidden md:block">Logged in as <b>{{ auth()->user()->name }}</b></span>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="text-sm text-red-500 hover:text-red-700 font-medium">Logout</button>
                </form>
            </div>
        </header>

        <!-- Main -->
        <main class="flex-1 overflow-y-auto p-4 md:p-8 bg-gray-50">
            <div class="max-w-7xl mx-auto">
                @yield('content')
            </div>
        </main>
    </div>

    <script>
        lucide.createIcons();

        // Sidebar Toggle Logic
        const sidebar = document.getElementById('admin-sidebar');
        const overlay = document.getElementById('sidebar-overlay');
        const toggleBtn = document.getElementById('toggle-sidebar');
        const closeBtn = document.getElementById('close-sidebar');

        function toggleSidebar() {
            sidebar.classList.toggle('-translate-x-full');
            overlay.classList.toggle('hidden');
            setTimeout(() => {
                overlay.classList.toggle('opacity-0');
            }, 10);
        }

        if(toggleBtn) toggleBtn.addEventListener('click', toggleSidebar);
        if(closeBtn) closeBtn.addEventListener('click', toggleSidebar);
        if(overlay) overlay.addEventListener('click', toggleSidebar);
    </script>
    @stack('scripts')
</body>
</html>
