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
        <div class="max-w-2xl" data-aos="fade-up">
            <span class="inline-block px-3 py-1 bg-brand-green text-white text-xs font-semibold rounded-full uppercase tracking-wider mb-4">Portal Resmi</span>
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-white leading-tight mb-6">
                Layanan Informasi Publik<br>Kemenag Sumenep
            </h1>
            <p class="text-lg text-gray-200 mb-8 max-w-xl">
                Transparansi dan kemudahan akses informasi publik di lingkungan Kementerian Agama Kabupaten Sumenep. Wujudkan tata kelola pemerintahan yang baik dan bersih.
            </p>
            <div class="flex flex-col sm:flex-row gap-4" data-aos="fade-up" data-aos-delay="200">
                <a href="{{ route('requests.create') }}" class="bg-brand-gold hover:bg-yellow-600 text-white font-semibold py-3 px-8 rounded-full shadow-lg hover:shadow-xl transition duration-300 transform hover:-translate-y-1 text-center">
                    Ajukan Permohonan
                </a>
                <a href="{{ route('requests.track') }}" class="bg-white/10 hover:bg-white/20 text-white border border-white/30 font-semibold py-3 px-8 rounded-full shadow-lg hover:shadow-xl transition duration-300 transform hover:-translate-y-1 text-center backdrop-blur-sm">
                    Cek Status
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Services Section -->
<div id="layanan" class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl font-bold text-gray-900 mb-2" data-aos="fade-up">Layanan Kami</h2>
        <p class="text-gray-600 mb-12" data-aos="fade-up" data-aos-delay="100">Akses cepat ke berbagai layanan informasi publik PPID.</p>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-left">
            <!-- Card 1 -->
            <div class="bg-white border border-gray-200 rounded-xl p-6 hover:shadow-lg transition duration-300 transform hover:-translate-y-1" data-aos="fade-up" data-aos-delay="100">
                <div class="w-12 h-12 bg-green-50 rounded-lg flex items-center justify-center mb-6 text-brand-green">
                    <i data-lucide="clipboard-list" class="w-6 h-6"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-3">Permohonan Informasi</h3>
                <p class="text-gray-600 mb-6 text-sm">Ajukan permohonan informasi publik secara online dengan mudah dan cepat.</p>
                <a href="#" class="text-sm font-medium text-gray-900 hover:text-brand-green flex items-center gap-1">Mulai Permohonan <i data-lucide="arrow-right" class="w-4 h-4"></i></a>
            </div>
            
            <!-- Card 2 -->
            <div class="bg-white border border-gray-200 rounded-xl p-6 hover:shadow-lg transition duration-300 transform hover:-translate-y-1" data-aos="fade-up" data-aos-delay="200">
                <div class="w-12 h-12 bg-yellow-50 rounded-lg flex items-center justify-center mb-6 text-yellow-600">
                    <i data-lucide="folder-open" class="w-6 h-6"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-3">Arsip Dokumen</h3>
                <p class="text-gray-600 mb-6 text-sm">Akses dan unduh berbagai dokumen publik, laporan, dan regulasi resmi.</p>
                <a href="{{ route('documents.index') }}" class="text-sm font-medium text-gray-900 hover:text-brand-green flex items-center gap-1">Lihat Arsip <i data-lucide="arrow-right" class="w-4 h-4"></i></a>
            </div>

            <!-- Card 3 -->
            <div class="bg-white border border-gray-200 rounded-xl p-6 hover:shadow-lg transition duration-300 transform hover:-translate-y-1" data-aos="fade-up" data-aos-delay="300">
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
        <div class="flex justify-between items-end mb-8 border-b border-gray-200 pb-4" data-aos="fade-up">
            <div>
                <h2 class="text-2xl font-bold text-gray-900 mb-1">Berita Terbaru</h2>
                <p class="text-sm text-gray-600">Informasi terkini seputar kegiatan dan pengumuman Kemenag Sumenep.</p>
            </div>
            <a href="{{ route('news.index') }}" class="text-sm font-medium text-gray-600 hover:text-brand-green flex items-center gap-1">Lihat Semua Berita <i data-lucide="arrow-right" class="w-4 h-4"></i></a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($latestNews as $index => $newsItem)
                @if($index === 0)
                    <!-- Large Card -->
                    <a href="{{ route('news.show', $newsItem->slug) }}" class="lg:col-span-1 bg-white border border-gray-200 rounded-xl overflow-hidden shadow-sm hover:shadow-lg transition duration-300 transform hover:-translate-y-1 flex flex-col group" data-aos="fade-up" data-aos-delay="100">
                        <div class="relative h-48 bg-gray-200 overflow-hidden">
                            <img src="{{ $newsItem->image_path }}" alt="{{ $newsItem->title }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                            @if($newsItem->category)
                            <span class="absolute top-4 left-4 bg-brand-green text-white text-xs font-semibold px-2 py-1 rounded">{{ $newsItem->category }}</span>
                            @endif
                        </div>
                        <div class="p-5 flex-grow">
                            <div class="text-xs text-gray-500 mb-2">{{ \Carbon\Carbon::parse($newsItem->published_at)->format('d F Y') }}</div>
                            <h3 class="text-lg font-bold text-gray-900 mb-2 leading-snug group-hover:text-brand-green transition">{{ $newsItem->title }}</h3>
                            <p class="text-sm text-gray-600 line-clamp-2">{{ Str::limit($newsItem->content, 120) }}</p>
                        </div>
                    </a>
                @else
                    <!-- Normal Card -->
                    <a href="{{ route('news.show', $newsItem->slug) }}" class="bg-white border border-gray-200 rounded-xl overflow-hidden shadow-sm hover:shadow-lg transition duration-300 transform hover:-translate-y-1 flex flex-col group" data-aos="fade-up" data-aos-delay="{{ 100 * ($index + 1) }}">
                        <div class="h-40 bg-gray-200 overflow-hidden">
                            <img src="{{ $newsItem->image_path }}" alt="{{ $newsItem->title }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                        </div>
                        <div class="p-5 flex-grow">
                            <div class="text-xs text-gray-500 mb-2">{{ \Carbon\Carbon::parse($newsItem->published_at)->format('d F Y') }}</div>
                            <h3 class="text-lg font-bold text-gray-900 leading-snug group-hover:text-brand-green transition">{{ $newsItem->title }}</h3>
                        </div>
                    </a>
                @endif
            @endforeach
        </div>
    </div>
</div>
@endsection
