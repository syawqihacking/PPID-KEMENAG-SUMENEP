<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PPID Kemenag Sumenep</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/lucide@latest"></script>
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-gray-50 flex flex-col min-h-screen text-gray-800">

    <!-- Navigation -->
    <nav class="bg-white border-b border-gray-100 py-4">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex justify-between items-center">
            <div class="flex items-center gap-2">
                <!-- Placeholder for logo, replace with actual SVG or image -->
                <div class="w-8 h-8 flex items-center justify-center">
                   <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-brand-green">
                        <path d="M12 2L2 7L12 12L22 7L12 2Z" fill="currentColor"/>
                        <path d="M2 17L12 22L22 17" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M2 12L12 17L22 12" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                   </svg>
                </div>
                <span class="font-bold text-lg text-brand-green tracking-tight">PPID KEMENAG SUMENEP</span>
            </div>
            
            <div class="hidden md:flex space-x-8 items-center text-sm font-medium">
                <a href="{{ route('home') }}" class="text-gray-600 hover:text-brand-green transition {{ request()->routeIs('home') ? 'text-brand-green border-b-2 border-brand-green pb-1' : '' }}">Home</a>
                <a href="{{ route('profil.index') }}" class="text-gray-600 hover:text-brand-green transition {{ request()->routeIs('profil.index') ? 'text-brand-green border-b-2 border-brand-green pb-1' : '' }}">Profil PPID</a>
                <a href="{{ route('prosedur.index') }}" class="text-gray-600 hover:text-brand-green transition {{ request()->routeIs('prosedur.index') ? 'text-brand-green border-b-2 border-brand-green pb-1' : '' }}">Standar Layanan</a>
                <a href="{{ route('news.index') }}" class="text-gray-600 hover:text-brand-green transition {{ request()->routeIs('news.index') ? 'text-brand-green border-b-2 border-brand-green pb-1' : '' }}">News</a>
                <a href="{{ route('documents.index') }}" class="text-gray-600 hover:text-brand-green transition {{ request()->routeIs('documents.index') ? 'text-brand-green border-b-2 border-brand-green pb-1' : '' }}">PPID Info</a>
            </div>

            <div class="hidden md:flex items-center gap-4">
                <form action="{{ route('search') }}" method="GET" class="relative">
                    <input type="text" name="q" placeholder="Cari..." class="w-32 lg:w-48 bg-gray-50 border border-gray-200 rounded-full pl-8 pr-3 py-1.5 text-sm focus:outline-none focus:ring-1 focus:ring-brand-green focus:border-brand-green transition-all" required minlength="2">
                    <i data-lucide="search" class="w-4 h-4 text-gray-400 absolute left-2.5 top-2"></i>
                </form>
                <a href="{{ route('login') }}" class="bg-brand-dark text-white px-5 py-2 rounded-md font-medium text-sm hover:bg-green-900 transition shadow-sm">Login</a>
            </div>

            <!-- Mobile menu button -->
            <div class="md:hidden flex items-center">
                <button id="mobile-menu-btn" class="text-gray-600 hover:text-gray-900 focus:outline-none">
                    <i data-lucide="menu"></i>
                </button>
            </div>
        </div>
        
        <!-- Mobile Menu (Hidden by default) -->
        <div id="mobile-menu" class="hidden md:hidden border-t border-gray-100 bg-white">
            <div class="px-4 pt-2 pb-4 space-y-1">
                <a href="{{ route('home') }}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-brand-green hover:bg-gray-50">Home</a>
                <a href="{{ route('profil.index') }}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-brand-green hover:bg-gray-50">Profil PPID</a>
                <a href="{{ route('prosedur.index') }}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-brand-green hover:bg-gray-50">Standar Layanan</a>
                <a href="{{ route('news.index') }}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-brand-green hover:bg-gray-50">News</a>
                <a href="{{ route('documents.index') }}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-brand-green hover:bg-gray-50">PPID Info</a>
                <a href="{{ route('login') }}" class="block px-3 py-2 mt-4 text-center rounded-md text-base font-medium bg-brand-dark text-white hover:bg-green-900">Login Admin</a>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="flex-grow">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-100 py-12 mt-12 border-t border-gray-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div class="col-span-1 md:col-span-1">
                    <div class="flex items-center gap-2 mb-4">
                        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-brand-green">
                            <path d="M12 2L2 7L12 12L22 7L12 2Z" fill="currentColor"/>
                            <path d="M2 17L12 22L22 17" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M2 12L12 17L22 12" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                       </svg>
                        <span class="font-bold text-brand-green">PPID KEMENAG SUMENEP</span>
                    </div>
                    <p class="text-gray-500 text-sm leading-relaxed mb-4">
                        Portal Resmi Layanan Informasi dan Dokumentasi Kementerian Agama Kabupaten Sumenep.
                    </p>
                </div>
                
                <div>
                    <h3 class="font-semibold text-gray-900 mb-4 text-sm">Tautan Terkait</h3>
                    <ul class="space-y-3 text-sm text-gray-600">
                        <li><a href="https://kemenag.go.id" target="_blank" class="hover:text-brand-green transition underline">Kementerian Agama RI</a></li>
                        <li><a href="https://jatim.kemenag.go.id" target="_blank" class="hover:text-brand-green transition underline">Kanwil Kemenag Jatim</a></li>
                        <li><a href="https://sumenepkab.go.id" target="_blank" class="hover:text-brand-green transition underline">Pemkab Sumenep</a></li>
                    </ul>
                </div>

                <div>
                    <h3 class="font-semibold text-gray-900 mb-4 text-sm">Layanan Kami</h3>
                    <ul class="space-y-3 text-sm text-gray-600">
                        <li><a href="{{ route('dip.index') }}" class="hover:text-brand-green transition underline">Daftar Informasi Publik (DIP)</a></li>
                        <li><a href="{{ route('requests.create') }}" class="hover:text-brand-green transition underline">Permohonan Informasi</a></li>
                        <li><a href="{{ route('faq.index') }}" class="hover:text-brand-green transition underline">FAQ (Tanya Jawab)</a></li>
                        <li><a href="{{ route('reviews.index') }}" class="hover:text-brand-green transition underline">Ulasan & Penilaian</a></li>
                    </ul>
                </div>

                <div>
                    <h3 class="font-semibold text-gray-900 mb-4 text-sm">Hubungi Kami</h3>
                    <ul class="space-y-3 text-sm text-gray-600">
                        <li><a href="{{ route('kontak.index') }}" class="hover:text-brand-green transition underline">Kontak & Lokasi</a></li>
                        <li class="flex gap-2 items-start"><i data-lucide="phone" class="w-4 h-4 mt-0.5 text-gray-400"></i> {{ \App\Models\Setting::get('kontak_telepon', '(0328) 662-124') }}</li>
                        <li class="flex gap-2 items-start"><i data-lucide="mail" class="w-4 h-4 mt-0.5 text-gray-400"></i> {{ explode(',', \App\Models\Setting::get('kontak_email', 'ppid.sumenep@kemenag.go.id'))[0] }}</li>
                    </ul>
                </div>
            </div>
            
            <div class="mt-12 pt-8 border-t border-gray-200">
                <p class="text-xs text-gray-500">
                    &copy; {{ date('Y') }} PPID Kemenag Sumenep. All rights reserved. Official Portal for Public Information.<b>{Syawqi Developer} </b>
                </p>
            </div>
        </div>
    </footer>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        lucide.createIcons();
        AOS.init({
            duration: 800,
            once: true,
            easing: 'ease-out-cubic'
        });

        // Mobile Menu Toggle
        const mobileBtn = document.getElementById('mobile-menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');
        
        if(mobileBtn && mobileMenu) {
            mobileBtn.addEventListener('click', () => {
                mobileMenu.classList.toggle('hidden');
            });
        }
    </script>
</body>
</html>
