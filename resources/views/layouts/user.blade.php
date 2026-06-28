<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard - PPID</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/lucide@latest"></script>
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-gray-50 flex h-screen overflow-hidden text-gray-800">

    <!-- Sidebar -->
    <aside id="user-sidebar" class="fixed inset-y-0 left-0 w-64 bg-white border-r border-gray-200 flex flex-col z-50 transform -translate-x-full md:relative md:translate-x-0 transition-transform duration-300 ease-in-out shadow-sm">
        <!-- User Info -->
        <div class="p-6 border-b border-gray-200 flex items-center justify-between">
            <div class="flex items-center gap-3">
                <img src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name) }}&background=0D8ABC&color=fff" alt="User" class="w-10 h-10 rounded-full">
                <div>
                    <h3 class="font-bold text-brand-dark text-sm truncate max-w-[120px]">{{ auth()->user()->name }}</h3>
                    <span class="text-[10px] font-bold uppercase tracking-wider px-1.5 py-0.5 rounded bg-blue-100 text-blue-700">Pemohon</span>
                </div>
            </div>
        </div>

        <!-- Nav Links -->
        <nav class="p-4 space-y-1 flex-grow overflow-y-auto">
            <a href="{{ route('user.dashboard') }}" class="{{ request()->routeIs('user.dashboard') ? 'bg-brand-green text-white' : 'text-gray-600 hover:bg-gray-100 hover:text-brand-green' }} flex items-center gap-3 px-3 py-2 rounded-md text-sm font-medium transition">
                <i data-lucide="layout-dashboard" class="w-4 h-4"></i> Dashboard
            </a>
            
            <a href="{{ route('requests.create') }}" class="text-gray-600 hover:bg-gray-100 hover:text-brand-green flex items-center gap-3 px-3 py-2 rounded-md text-sm font-medium transition">
                <i data-lucide="plus-circle" class="w-4 h-4"></i> Ajukan Permohonan
            </a>

            <a href="{{ route('user.requests.index') }}" class="{{ request()->routeIs('user.requests.*') ? 'bg-brand-green text-white' : 'text-gray-600 hover:bg-gray-100 hover:text-brand-green' }} flex items-center gap-3 px-3 py-2 rounded-md text-sm font-medium transition">
                <i data-lucide="file-clock" class="w-4 h-4"></i> Riwayat Permohonan
            </a>

            <div class="pt-4 pb-2">
                <p class="px-3 text-xs font-semibold text-gray-400 uppercase tracking-wider">Pengaturan Akun</p>
            </div>
            
            <a href="{{ route('user.profile.index') }}" class="{{ request()->routeIs('user.profile.*') ? 'bg-brand-green text-white' : 'text-gray-600 hover:bg-gray-100 hover:text-brand-green' }} flex items-center gap-3 px-3 py-2 rounded-md text-sm font-medium transition">
                <i data-lucide="user" class="w-4 h-4"></i> Profil Saya
            </a>
        </nav>
        
        <div class="p-4 border-t border-gray-200">
             <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="w-full text-left text-gray-600 hover:text-red-600 flex items-center gap-3 px-3 py-2 text-sm font-medium transition rounded-md hover:bg-red-50">
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
                <button id="toggle-sidebar" class="md:hidden text-gray-500 hover:text-brand-green">
                    <i data-lucide="menu" class="w-6 h-6"></i>
                </button>
                <h1 class="text-lg md:text-xl font-bold text-brand-dark">@yield('title', 'Dashboard Pemohon')</h1>
            </div>
            <a href="{{ route('home') }}" class="text-sm font-medium text-brand-green hover:underline">Kembali ke Web</a>
        </header>

        <!-- Main -->
        <main class="flex-1 overflow-y-auto p-4 md:p-8 bg-gray-50">
            <div class="max-w-5xl mx-auto">
                @yield('content')
            </div>
        </main>
    </div>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        lucide.createIcons();
        AOS.init({ duration: 600, once: true, easing: 'ease-out' });

        const sidebar = document.getElementById('user-sidebar');
        const toggleBtn = document.getElementById('toggle-sidebar');

        if(toggleBtn) {
            toggleBtn.addEventListener('click', () => {
                sidebar.classList.toggle('-translate-x-full');
            });
        }
    </script>
    @stack('scripts')
</body>
</html>
