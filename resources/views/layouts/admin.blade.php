<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - PPID</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
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
                <img src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name) }}&background=0D8ABC&color=fff" alt="Admin" class="w-10 h-10 rounded-full">
                <div>
                    <h3 class="font-bold text-brand-green text-sm">{{ auth()->user()->name }}</h3>
                    <span class="text-[10px] font-bold uppercase tracking-wider px-1.5 py-0.5 rounded {{ auth()->user()->isAdmin() ? 'bg-red-100 text-red-700' : 'bg-blue-100 text-blue-700' }}">{{ auth()->user()->role }}</span>
                </div>
            </div>
            <button id="close-sidebar" class="md:hidden text-gray-400 hover:text-gray-600">
                <i data-lucide="x" class="w-6 h-6"></i>
            </button>
        </div>

        <!-- Action Button -->
        <div class="p-4">
            <a href="{{ route('admin.news.create') }}" class="w-full bg-brand-dark hover:bg-green-900 text-white py-2 rounded-md font-medium text-sm flex items-center justify-center gap-2 transition shadow-sm">
                <i data-lucide="plus" class="w-4 h-4"></i> New Post
            </a>
        </div>

        <!-- Nav Links -->
        <nav class="p-4 space-y-1 flex-grow overflow-y-auto">
            <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'bg-brand-green text-white' : 'text-gray-600 hover:bg-gray-200 hover:text-gray-900' }} flex items-center gap-3 px-3 py-2 rounded-md text-sm font-medium transition">
                <i data-lucide="layout-dashboard" class="w-4 h-4"></i> Dashboard
            </a>

            {{-- ADMIN: Semua Fitur Manajerial & Konten --}}
            <div class="pt-4 pb-2">
                <p class="px-3 text-xs font-semibold text-gray-400 uppercase tracking-wider">Kelola Konten</p>
            </div>
            <a href="{{ route('admin.news.index') }}" class="{{ request()->routeIs('admin.news.*') ? 'bg-brand-green text-white' : 'text-gray-600 hover:bg-gray-200 hover:text-gray-900' }} flex items-center gap-3 px-3 py-2 rounded-md text-sm font-medium transition">
                <i data-lucide="newspaper" class="w-4 h-4"></i> Kelola Berita
            </a>
            <a href="{{ route('admin.documents.index') }}" class="{{ request()->routeIs('admin.documents.*') ? 'bg-brand-green text-white' : 'text-gray-600 hover:bg-gray-200 hover:text-gray-900' }} flex items-center gap-3 px-3 py-2 rounded-md text-sm font-medium transition">
                <i data-lucide="file-text" class="w-4 h-4"></i> Kelola Dokumen
            </a>
            <a href="{{ route('admin.dip.index') }}" class="{{ request()->routeIs('admin.dip.*') ? 'bg-brand-green text-white' : 'text-gray-600 hover:bg-gray-200 hover:text-gray-900' }} flex items-center gap-3 px-3 py-2 rounded-md text-sm font-medium transition">
                <i data-lucide="folder-tree" class="w-4 h-4"></i> Kelola DIP
            </a>
            <a href="{{ route('admin.faqs.index') }}" class="{{ request()->routeIs('admin.faqs.*') ? 'bg-brand-green text-white' : 'text-gray-600 hover:bg-gray-200 hover:text-gray-900' }} flex items-center gap-3 px-3 py-2 rounded-md text-sm font-medium transition">
                <i data-lucide="help-circle" class="w-4 h-4"></i> Kelola FAQ
            </a>
            <a href="{{ route('admin.chatbot_knowledge.index') }}" class="{{ request()->routeIs('admin.chatbot_knowledge.*') ? 'bg-brand-green text-white' : 'text-gray-600 hover:bg-gray-200 hover:text-gray-900' }} flex items-center gap-3 px-3 py-2 rounded-md text-sm font-medium transition">
                <i data-lucide="brain" class="w-4 h-4"></i> Pengetahuan AI
            </a>

            <div class="pt-4 pb-2">
                <p class="px-3 text-xs font-semibold text-gray-400 uppercase tracking-wider">Layanan Publik</p>
            </div>
            <a href="{{ route('admin.requests.index') }}" class="{{ request()->routeIs('admin.requests.*') ? 'bg-brand-green text-white' : 'text-gray-600 hover:bg-gray-200 hover:text-gray-900' }} flex items-center gap-3 px-3 py-2 rounded-md text-sm font-medium transition">
                <i data-lucide="mail" class="w-4 h-4"></i> Permohonan Informasi
            </a>
            <a href="{{ route('admin.reviews.index') }}" class="{{ request()->routeIs('admin.reviews.*') ? 'bg-brand-green text-white' : 'text-gray-600 hover:bg-gray-200 hover:text-gray-900' }} flex items-center gap-3 px-3 py-2 rounded-md text-sm font-medium transition">
                <i data-lucide="message-square" class="w-4 h-4"></i> Moderasi Ulasan
            </a>
            
            <div class="pt-4 pb-2">
                <p class="px-3 text-xs font-semibold text-gray-400 uppercase tracking-wider">Sistem</p>
            </div>
            <a href="{{ route('admin.settings.index') }}" class="{{ request()->routeIs('admin.settings.*') ? 'bg-brand-green text-white' : 'text-gray-600 hover:bg-gray-200 hover:text-gray-900' }} flex items-center gap-3 px-3 py-2 rounded-md text-sm font-medium transition">
                <i data-lucide="settings" class="w-4 h-4"></i> Settings Website
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
                <h1 class="text-lg md:text-xl font-bold text-brand-dark truncate max-w-[200px] md:max-w-none">@yield('title', 'Dashboard Overview')</h1>
            </div>
            
            <div class="flex items-center gap-3 md:gap-4">
                <!-- Notifications Dropdown -->
                <div class="relative">
                    <button id="notif-btn" class="text-gray-500 hover:text-gray-700 relative p-1.5 rounded-lg hover:bg-gray-100 transition">
                        <i data-lucide="bell" class="w-5 h-5"></i>
                        @if($notif_count > 0)
                        <span class="absolute top-1.5 right-1.5 block h-2 w-2 rounded-full bg-red-500 ring-2 ring-white"></span>
                        @endif
                    </button>
                    
                    <div id="notif-dropdown" class="absolute right-0 mt-2 w-80 bg-white border border-gray-200 rounded-xl shadow-xl z-50 hidden">
                        <div class="p-4 border-b border-gray-100 flex justify-between items-center">
                            <h4 class="font-bold text-sm">Notifikasi</h4>
                            <span class="text-xs bg-red-100 text-red-600 px-2 py-0.5 rounded-full">{{ $notif_count }} Baru</span>
                        </div>
                        <div class="max-h-64 overflow-y-auto">
                            @forelse($notifications as $notif)
                            <a href="{{ route('admin.requests.show', $notif->id) }}" class="block p-4 border-b border-gray-50 hover:bg-gray-50 transition">
                                <p class="text-xs font-bold text-gray-900 mb-0.5">Permohonan Baru: {{ $notif->name }}</p>
                                <p class="text-[10px] text-gray-500 line-clamp-1">{{ $notif->subject }}</p>
                                <p class="text-[10px] text-brand-green mt-1">{{ $notif->created_at->diffForHumans() }}</p>
                            </a>
                            @empty
                            <div class="p-8 text-center text-gray-400 text-sm">Tidak ada notifikasi baru</div>
                            @endforelse
                        </div>
                        <a href="{{ route('admin.requests.index') }}" class="block p-3 text-center text-xs font-bold text-brand-green hover:bg-gray-50">Lihat Semua Permohonan</a>
                    </div>
                </div>

                <!-- User Dropdown -->
                <div class="relative">
                    <button id="user-btn" class="text-gray-500 hover:text-gray-700 p-0.5 rounded-full border-2 border-transparent hover:border-brand-green transition">
                        <img src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name) }}&background=0D8ABC&color=fff" class="w-8 h-8 rounded-full" alt="User">
                    </button>
                    
                    <div id="user-dropdown" class="absolute right-0 mt-2 w-48 bg-white border border-gray-200 rounded-xl shadow-xl z-50 hidden">
                        <div class="p-4 border-b border-gray-100">
                            <p class="text-xs text-gray-400 font-medium mb-0.5">Logged in as:</p>
                            <p class="text-sm font-bold text-gray-900 truncate">{{ auth()->user()->name }}</p>
                        </div>
                        <div class="p-2">
                            <a href="{{ route('admin.profile.index') }}" class="flex items-center gap-2 px-3 py-2 text-sm text-gray-600 hover:bg-gray-100 hover:text-brand-green rounded-lg transition">
                                <i data-lucide="user" class="w-4 h-4"></i> Profil Saya
                            </a>
                            <a href="{{ route('admin.profile.index') }}#security-section" class="flex items-center gap-2 px-3 py-2 text-sm text-gray-600 hover:bg-gray-100 hover:text-brand-green rounded-lg transition">
                                <i data-lucide="lock" class="w-4 h-4"></i> Ubah Password
                            </a>
                            <div class="my-1 border-t border-gray-100"></div>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="w-full flex items-center gap-2 px-3 py-2 text-sm text-red-600 hover:bg-red-50 rounded-lg transition text-left">
                                    <i data-lucide="log-out" class="w-4 h-4"></i> Keluar
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- Main -->
        <main class="flex-1 overflow-y-auto p-4 md:p-8 bg-gray-50">
            <div class="max-w-7xl mx-auto">
                @yield('content')
            </div>
        </main>
    </div>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        lucide.createIcons();
        AOS.init({
            duration: 600,
            once: true,
            easing: 'ease-out'
        });

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

        // Dropdown Logic
        const notifBtn = document.getElementById('notif-btn');
        const notifDropdown = document.getElementById('notif-dropdown');
        const userBtn = document.getElementById('user-btn');
        const userDropdown = document.getElementById('user-dropdown');

        function toggleDropdown(btn, dropdown) {
            dropdown.classList.toggle('hidden');
        }

        if(notifBtn) notifBtn.addEventListener('click', (e) => {
            e.stopPropagation();
            userDropdown.classList.add('hidden');
            toggleDropdown(notifBtn, notifDropdown);
        });

        if(userBtn) userBtn.addEventListener('click', (e) => {
            e.stopPropagation();
            notifDropdown.classList.add('hidden');
            toggleDropdown(userBtn, userDropdown);
        });

        window.addEventListener('click', () => {
            if(notifDropdown) notifDropdown.classList.add('hidden');
            if(userDropdown) userDropdown.classList.add('hidden');
        });
    </script>
    @stack('scripts')
</body>
</html>
