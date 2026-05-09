@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<div class="relative bg-gray-900 overflow-hidden">
    <!-- Background Image with Overlay -->
    <div class="absolute inset-0">
        <img src="https://images.unsplash.com/photo-1577983072965-0d4daebceb44?auto=format&fit=crop&q=80" alt="Kemenag Building" class="w-full h-full object-cover opacity-40">
        <div class="absolute inset-0 bg-gradient-to-r from-gray-900/80 to-transparent"></div>
    </div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24 lg:py-32">
        <div class="max-w-2xl">
            <span class="inline-block px-3 py-1 bg-brand-green text-white text-xs font-semibold rounded-full uppercase tracking-wider mb-4">Portal Resmi</span>
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-white leading-tight mb-6">
                Layanan Informasi Publik<br>Kemenag Sumenep
            </h1>
            <p class="text-lg text-gray-200 mb-8 max-w-xl">
                Transparansi dan kemudahan akses informasi publik di lingkungan Kementerian Agama Kabupaten Sumenep. Wujudkan tata kelola pemerintahan yang baik dan bersih.
            </p>
            <div class="flex flex-wrap gap-4">
                <a href="#" class="bg-brand-dark hover:bg-green-900 text-white px-6 py-3 rounded-md font-medium transition shadow-lg">Ajukan Permohonan</a>
                <a href="#layanan" class="bg-white/10 hover:bg-white/20 text-white border border-white/30 px-6 py-3 rounded-md font-medium transition backdrop-blur-sm">Pelajari Lebih Lanjut</a>
            </div>
        </div>
    </div>
</div>

<!-- Services Section -->
<div id="layanan" class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl font-bold text-gray-900 mb-2">Layanan Kami</h2>
        <p class="text-gray-600 mb-12">Akses cepat ke berbagai layanan informasi publik PPID.</p>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-left">
            <!-- Card 1 -->
            <div class="bg-white border border-gray-200 rounded-xl p-6 hover:shadow-md transition">
                <div class="w-12 h-12 bg-green-50 rounded-lg flex items-center justify-center mb-6 text-brand-green">
                    <i data-lucide="clipboard-list" class="w-6 h-6"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-3">Permohonan Informasi</h3>
                <p class="text-gray-600 mb-6 text-sm">Ajukan permohonan informasi publik secara online dengan mudah dan cepat.</p>
                <a href="#" class="text-sm font-medium text-gray-900 hover:text-brand-green flex items-center gap-1">Mulai Permohonan <i data-lucide="arrow-right" class="w-4 h-4"></i></a>
            </div>
            
            <!-- Card 2 -->
            <div class="bg-white border border-gray-200 rounded-xl p-6 hover:shadow-md transition">
                <div class="w-12 h-12 bg-yellow-50 rounded-lg flex items-center justify-center mb-6 text-yellow-600">
                    <i data-lucide="folder-open" class="w-6 h-6"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-3">Arsip Dokumen</h3>
                <p class="text-gray-600 mb-6 text-sm">Akses dan unduh berbagai dokumen publik, laporan, dan regulasi resmi.</p>
                <a href="{{ route('ppid.info') }}" class="text-sm font-medium text-gray-900 hover:text-brand-green flex items-center gap-1">Lihat Arsip <i data-lucide="arrow-right" class="w-4 h-4"></i></a>
            </div>

            <!-- Card 3 -->
            <div class="bg-white border border-gray-200 rounded-xl p-6 hover:shadow-md transition">
                <div class="w-12 h-12 bg-gray-100 rounded-lg flex items-center justify-center mb-6 text-gray-600">
                    <i data-lucide="megaphone" class="w-6 h-6"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-3">Laporan Publik</h3>
                <p class="text-gray-600 mb-6 text-sm">Sampaikan laporan atau pengaduan terkait layanan publik di lingkungan Kemenag.</p>
                <a href="#" class="text-sm font-medium text-gray-900 hover:text-brand-green flex items-center gap-1">Buat Laporan <i data-lucide="arrow-right" class="w-4 h-4"></i></a>
            </div>
        </div>
    </div>
</div>

<!-- Latest News Section -->
<div id="news" class="py-16 bg-gray-50 border-t border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-end mb-8 border-b border-gray-200 pb-4">
            <div>
                <h2 class="text-2xl font-bold text-gray-900 mb-1">Berita Terbaru</h2>
                <p class="text-sm text-gray-600">Informasi terkini seputar kegiatan dan pengumuman Kemenag Sumenep.</p>
            </div>
            <a href="#" class="text-sm font-medium text-gray-600 hover:text-brand-green flex items-center gap-1">Lihat Semua Berita <i data-lucide="arrow-right" class="w-4 h-4"></i></a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Example Static News Cards to match image -->
            <!-- Large Card -->
            <div class="lg:col-span-1 bg-white border border-gray-200 rounded-xl overflow-hidden shadow-sm hover:shadow-md transition flex flex-col">
                <div class="relative h-48 bg-gray-200">
                    <img src="https://images.unsplash.com/photo-1542744173-8e7e53415bb0?auto=format&fit=crop&q=80" alt="News" class="w-full h-full object-cover">
                    <span class="absolute top-4 left-4 bg-brand-green text-white text-xs font-semibold px-2 py-1 rounded">Pengumuman</span>
                </div>
                <div class="p-5 flex-grow">
                    <div class="text-xs text-gray-500 mb-2">24 Oktober 2024</div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2 leading-snug">Rapat Koordinasi Optimalisasi Layanan PPID Kemenag Sumenep Tahun 2024</h3>
                    <p class="text-sm text-gray-600 line-clamp-2">Kemenag Sumenep menggelar rapat koordinasi untuk meningkatkan kualitas pelayanan informasi publik di tingkat kabupaten...</p>
                </div>
            </div>

            <!-- Normal Card 1 -->
            <div class="bg-white border border-gray-200 rounded-xl overflow-hidden shadow-sm hover:shadow-md transition flex flex-col">
                <div class="h-40 bg-gray-200">
                    <img src="https://images.unsplash.com/photo-1434030216411-0b793f4b4173?auto=format&fit=crop&q=80" alt="News" class="w-full h-full object-cover">
                </div>
                <div class="p-5 flex-grow">
                    <div class="text-xs text-gray-500 mb-2">22 Oktober 2024</div>
                    <h3 class="text-lg font-bold text-gray-900 leading-snug">Panduan Baru Pengajuan Dokumen Online</h3>
                </div>
            </div>

            <!-- Normal Card 2 -->
            <div class="bg-white border border-gray-200 rounded-xl overflow-hidden shadow-sm hover:shadow-md transition flex flex-col">
                <div class="h-40 bg-gray-200">
                    <img src="https://images.unsplash.com/photo-1450101499163-c8848c66ca85?auto=format&fit=crop&q=80" alt="News" class="w-full h-full object-cover">
                </div>
                <div class="p-5 flex-grow">
                    <div class="text-xs text-gray-500 mb-2">20 Oktober 2024</div>
                    <h3 class="text-lg font-bold text-gray-900 leading-snug">Laporan Tahunan Pelayanan Publik Telah Dirilis</h3>
                </div>
            </div>
            
            {{-- In a real scenario, we loop through $latestNews here --}}
        </div>
    </div>
</div>
@endsection
