@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<div class="relative bg-gray-900 overflow-hidden">
    <!-- Background Image with Overlay -->
    <div class="absolute inset-0">
        <img src="https://images.unsplash.com/photo-1517048676732-d65bc937f952?auto=format&fit=crop&q=80" alt="PPID Background" class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-gradient-to-r from-gray-900/90 via-gray-900/50 to-transparent"></div>
    </div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24 lg:py-40">
        <div class="max-w-3xl" data-aos="fade-right">
            <span class="inline-block px-3 py-1 bg-green-500/20 text-green-400 text-xs font-semibold rounded-full uppercase tracking-wider mb-4 border border-green-500/30">Kementerian Agama Kabupaten Sumenep</span>
            <h1 class="text-4xl md:text-6xl font-extrabold text-white leading-tight mb-6">
                Selamat Datang di <br><span class="text-brand-green">Portal PPID</span>
            </h1>
            <p class="text-lg md:text-xl text-gray-200 mb-10 leading-relaxed max-w-2xl">
                Layanan informasi publik satu pintu yang transparan dan akuntabel sesuai dengan amanat Undang-Undang Keterbukaan Informasi Publik.
            </p>
            <div class="flex flex-wrap gap-4">
                <a href="{{ route('requests.create') }}" class="inline-flex items-center px-8 py-4 bg-brand-green hover:bg-green-600 text-white font-bold rounded-xl shadow-lg transition duration-300 transform hover:-translate-y-1">
                    <i data-lucide="file-plus" class="w-5 h-5 mr-2"></i>
                    Permohonan Informasi
                </a>
                <a href="{{ route('requests.track') }}" class="inline-flex items-center px-8 py-4 bg-white/10 hover:bg-white/20 text-white font-bold rounded-xl backdrop-blur-md border border-white/20 transition duration-300 transform hover:-translate-y-1">
                    <i data-lucide="search" class="w-5 h-5 mr-2"></i>
                    Cek Status
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Services Section -->
<div id="layanan" class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16" data-aos="fade-up">
            <h2 class="text-3xl font-bold text-gray-900 sm:text-4xl">Layanan Utama</h2>
            <p class="mt-4 text-lg text-gray-600">Akses cepat ke berbagai fitur utama portal informasi kami.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Card 1 -->
            <div class="bg-white border border-gray-200 rounded-3xl p-8 hover:shadow-xl transition duration-300" data-aos="fade-up" data-aos-delay="100">
                <div class="w-14 h-14 bg-green-50 rounded-2xl flex items-center justify-center mb-6 text-brand-green">
                    <i data-lucide="clipboard-list" class="w-8 h-8"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Permohonan Informasi</h3>
                <p class="text-gray-600 mb-6 leading-relaxed">Ajukan permohonan informasi publik secara online dengan mudah dan transparan.</p>
                <a href="{{ route('requests.create') }}" class="text-brand-green font-bold inline-flex items-center group">
                    Mulai Sekarang <i data-lucide="arrow-right" class="ml-2 w-4 h-4 group-hover:translate-x-1 transition"></i>
                </a>
            </div>
            
            <!-- Card 2 -->
            <div class="bg-white border border-gray-200 rounded-3xl p-8 hover:shadow-xl transition duration-300" data-aos="fade-up" data-aos-delay="200">
                <div class="w-14 h-14 bg-brand-green/10 rounded-2xl flex items-center justify-center mb-6 text-brand-green">
                    <i data-lucide="search" class="w-8 h-8"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Cek Progres</h3>
                <p class="text-gray-600 mb-6 leading-relaxed">Pantau perkembangan status permohonan informasi Anda secara real-time.</p>
                <a href="{{ route('requests.track') }}" class="text-brand-green font-bold inline-flex items-center group">
                    Lihat Status <i data-lucide="arrow-right" class="ml-2 w-4 h-4 group-hover:translate-x-1 transition"></i>
                </a>
            </div>

            <!-- Card 3 -->
            <div class="bg-white border border-gray-200 rounded-3xl p-8 hover:shadow-xl transition duration-300" data-aos="fade-up" data-aos-delay="300">
                <div class="w-14 h-14 bg-gray-50 rounded-2xl flex items-center justify-center mb-6 text-gray-600">
                    <i data-lucide="file-text" class="w-8 h-8"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Arsip Dokumen</h3>
                <p class="text-gray-600 mb-6 leading-relaxed">Akses dan unduh berbagai dokumen publik, laporan berkala, dan regulasi resmi.</p>
                <a href="{{ route('documents.index') }}" class="text-brand-green font-bold inline-flex items-center group">
                    Buka Arsip <i data-lucide="arrow-right" class="ml-2 w-4 h-4 group-hover:translate-x-1 transition"></i>
                </a>
            </div>
        </div>
    </div>
</div>

<!-- DIP Categories Grid -->
<div class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16" data-aos="fade-up">
            <span class="text-brand-green font-bold text-sm uppercase tracking-[0.2em] mb-3 block">Informasi Publik</span>
            <h2 class="text-4xl font-extrabold text-gray-900">Klasifikasi Informasi</h2>
            <div class="w-20 h-1.5 bg-brand-green mx-auto mt-6 rounded-full"></div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            <a href="{{ route('dip.index') }}?type=Berkala" class="group relative bg-gray-50 p-8 rounded-[2rem] border border-gray-100 hover:bg-white hover:shadow-2xl hover:shadow-green-900/10 transition-all duration-500 overflow-hidden" data-aos="fade-up" data-aos-delay="100">
                <div class="absolute top-0 right-0 -mr-8 -mt-8 w-32 h-32 bg-green-500/5 rounded-full group-hover:scale-150 transition-transform duration-700"></div>
                <div class="relative">
                    <div class="w-16 h-16 bg-white rounded-2xl flex items-center justify-center mb-8 text-brand-green shadow-sm group-hover:bg-brand-green group-hover:text-white transition-all duration-500 transform group-hover:rotate-6">
                        <i data-lucide="calendar" class="w-8 h-8"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Informasi Berkala</h3>
                    <p class="text-sm text-gray-500 leading-relaxed mb-4">Informasi yang wajib disediakan dan diumumkan secara rutin.</p>
                    <div class="flex items-center text-xs font-bold text-brand-green uppercase tracking-wider group-hover:translate-x-2 transition-transform">
                        Lihat Daftar <i data-lucide="arrow-right" class="w-3 h-3 ml-2"></i>
                    </div>
                </div>
            </a>
            
            <a href="{{ route('dip.index') }}?type=Serta Merta" class="group relative bg-gray-50 p-8 rounded-[2rem] border border-gray-100 hover:bg-white hover:shadow-2xl hover:shadow-blue-900/10 transition-all duration-500 overflow-hidden" data-aos="fade-up" data-aos-delay="200">
                <div class="absolute top-0 right-0 -mr-8 -mt-8 w-32 h-32 bg-blue-500/5 rounded-full group-hover:scale-150 transition-transform duration-700"></div>
                <div class="relative">
                    <div class="w-16 h-16 bg-white rounded-2xl flex items-center justify-center mb-8 text-blue-600 shadow-sm group-hover:bg-blue-600 group-hover:text-white transition-all duration-500 transform group-hover:rotate-6">
                        <i data-lucide="zap" class="w-8 h-8"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Serta Merta</h3>
                    <p class="text-sm text-gray-500 leading-relaxed mb-4">Informasi yang dapat mengancam hajat hidup orang banyak.</p>
                    <div class="flex items-center text-xs font-bold text-blue-600 uppercase tracking-wider group-hover:translate-x-2 transition-transform">
                        Lihat Daftar <i data-lucide="arrow-right" class="w-3 h-3 ml-2"></i>
                    </div>
                </div>
            </a>

            <a href="{{ route('dip.index') }}?type=Setiap Saat" class="group relative bg-gray-50 p-8 rounded-[2rem] border border-gray-100 hover:bg-white hover:shadow-2xl hover:shadow-yellow-900/10 transition-all duration-500 overflow-hidden" data-aos="fade-up" data-aos-delay="300">
                <div class="absolute top-0 right-0 -mr-8 -mt-8 w-32 h-32 bg-yellow-500/5 rounded-full group-hover:scale-150 transition-transform duration-700"></div>
                <div class="relative">
                    <div class="w-16 h-16 bg-white rounded-2xl flex items-center justify-center mb-8 text-yellow-600 shadow-sm group-hover:bg-yellow-500 group-hover:text-white transition-all duration-500 transform group-hover:rotate-6">
                        <i data-lucide="clock" class="w-8 h-8"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Setiap Saat</h3>
                    <p class="text-sm text-gray-500 leading-relaxed mb-4">Informasi yang wajib tersedia dan diberikan saat diminta.</p>
                    <div class="flex items-center text-xs font-bold text-yellow-600 uppercase tracking-wider group-hover:translate-x-2 transition-transform">
                        Lihat Daftar <i data-lucide="arrow-right" class="w-3 h-3 ml-2"></i>
                    </div>
                </div>
            </a>

            <a href="{{ route('dip.index') }}?type=Dikecualikan" class="group relative bg-gray-50 p-8 rounded-[2rem] border border-gray-100 hover:bg-white hover:shadow-2xl hover:shadow-red-900/10 transition-all duration-500 overflow-hidden" data-aos="fade-up" data-aos-delay="400">
                <div class="absolute top-0 right-0 -mr-8 -mt-8 w-32 h-32 bg-red-500/5 rounded-full group-hover:scale-150 transition-transform duration-700"></div>
                <div class="relative">
                    <div class="w-16 h-16 bg-white rounded-2xl flex items-center justify-center mb-8 text-red-600 shadow-sm group-hover:bg-red-600 group-hover:text-white transition-all duration-500 transform group-hover:rotate-6">
                        <i data-lucide="lock" class="w-8 h-8"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Dikecualikan</h3>
                    <p class="text-sm text-gray-500 leading-relaxed mb-4">Informasi yang tidak dapat diakses publik karena alasan hukum.</p>
                    <div class="flex items-center text-xs font-bold text-red-600 uppercase tracking-wider group-hover:translate-x-2 transition-transform">
                        Lihat Daftar <i data-lucide="arrow-right" class="w-3 h-3 ml-2"></i>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>

<!-- Stats Section -->
<div class="py-20 bg-white relative">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-brand-dark rounded-[3rem] p-12 md:p-16 shadow-2xl relative overflow-hidden">
            <!-- Background Decorations -->
            <div class="absolute top-0 right-0 w-64 h-64 bg-brand-green/10 rounded-full blur-3xl -mr-32 -mt-32"></div>
            <div class="absolute bottom-0 left-0 w-64 h-64 bg-brand-green/10 rounded-full blur-3xl -ml-32 -mb-32"></div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 relative">
                <!-- Stat 1 -->
                <div class="text-center md:text-left group" data-aos="fade-up">
                    <div class="flex flex-col md:flex-row items-center gap-4">
                        <div class="w-16 h-16 bg-white/5 rounded-2xl flex items-center justify-center text-brand-green group-hover:bg-brand-green group-hover:text-white transition-all duration-500">
                            <i data-lucide="file-text" class="w-8 h-8"></i>
                        </div>
                        <div>
                            <div class="text-4xl font-black text-white mb-1 tabular-nums">{{ $stats['total_requests'] }}</div>
                            <div class="text-xs text-gray-400 font-bold uppercase tracking-widest">Permohonan Informasi</div>
                        </div>
                    </div>
                </div>

                <!-- Stat 2 -->
                <div class="text-center md:text-left group" data-aos="fade-up" data-aos-delay="100">
                    <div class="flex flex-col md:flex-row items-center gap-4">
                        <div class="w-16 h-16 bg-white/5 rounded-2xl flex items-center justify-center text-brand-green group-hover:bg-brand-green group-hover:text-white transition-all duration-500">
                            <i data-lucide="check-circle" class="w-8 h-8"></i>
                        </div>
                        <div>
                            <div class="text-4xl font-black text-white mb-1 tabular-nums">{{ $stats['completed_requests'] }}</div>
                            <div class="text-xs text-gray-400 font-bold uppercase tracking-widest">Selesai Diproses</div>
                        </div>
                    </div>
                </div>

                <!-- Stat 3 -->
                <div class="text-center md:text-left group" data-aos="fade-up" data-aos-delay="200">
                    <div class="flex flex-col md:flex-row items-center gap-4">
                        <div class="w-16 h-16 bg-white/5 rounded-2xl flex items-center justify-center text-brand-green group-hover:bg-brand-green group-hover:text-white transition-all duration-500">
                            <i data-lucide="folder" class="w-8 h-8"></i>
                        </div>
                        <div>
                            <div class="text-4xl font-black text-white mb-1 tabular-nums">{{ $stats['total_documents'] }}</div>
                            <div class="text-xs text-gray-400 font-bold uppercase tracking-widest">Dokumen Publik</div>
                        </div>
                    </div>
                </div>

                <!-- Stat 4 -->
                <div class="text-center md:text-left group" data-aos="fade-up" data-aos-delay="300">
                    <div class="flex flex-col md:flex-row items-center gap-4">
                        <div class="w-16 h-16 bg-white/5 rounded-2xl flex items-center justify-center text-brand-green group-hover:bg-brand-green group-hover:text-white transition-all duration-500">
                            <i data-lucide="heart" class="w-8 h-8"></i>
                        </div>
                        <div>
                            <div class="text-4xl font-black text-white mb-1 tabular-nums">{{ number_format($stats['avg_rating'], 1) }}</div>
                            <div class="text-xs text-gray-400 font-bold uppercase tracking-widest">Indeks Kepuasan</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Testimonials Section -->
@if($latestReviews->isNotEmpty())
<div class="py-28 bg-gray-50 relative overflow-hidden">
    <!-- Decorative background -->
    <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-transparent via-brand-green to-transparent opacity-20"></div>
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
        <div class="text-center mb-20" data-aos="fade-up">
            <span class="text-brand-green font-bold text-sm uppercase tracking-[0.2em] mb-3 block">Testimoni</span>
            <h2 class="text-4xl font-extrabold text-gray-900">Suara Masyarakat</h2>
            <p class="mt-4 text-gray-500 max-w-2xl mx-auto">Kami berkomitmen untuk terus meningkatkan pelayanan informasi publik berdasarkan masukan Anda.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
            @foreach($latestReviews as $review)
            <div class="bg-white p-10 rounded-[2.5rem] shadow-sm border border-gray-100 relative group hover:-translate-y-2 transition-all duration-500" data-aos="fade-up">
                <div class="absolute -top-6 left-10 w-12 h-12 bg-brand-green text-white rounded-2xl flex items-center justify-center shadow-lg transform -rotate-12 group-hover:rotate-0 transition-transform">
                    <i data-lucide="quote" class="w-6 h-6"></i>
                </div>
                
                <div class="flex text-yellow-400 mb-6 mt-2">
                    @for($i = 1; $i <= 5; $i++)
                    <i data-lucide="star" class="w-5 h-5 {{ $i <= $review->rating ? 'fill-current' : 'text-gray-100' }}"></i>
                    @endfor
                </div>
                
                <p class="text-gray-700 italic text-lg leading-relaxed mb-8">"{{ $review->comment }}"</p>
                
                <div class="flex items-center gap-4 pt-6 border-t border-gray-50">
                    <div class="w-12 h-12 bg-gradient-to-br from-brand-green to-green-700 text-white rounded-2xl flex items-center justify-center font-bold text-xl shadow-md">
                        {{ substr($review->name, 0, 1) }}
                    </div>
                    <div>
                        <h4 class="font-black text-gray-900 leading-none mb-1">{{ $review->name }}</h4>
                        <p class="text-xs text-gray-400 font-bold uppercase tracking-widest">{{ $review->created_at->diffForHumans() }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        
        <div class="text-center mt-16">
            <a href="{{ route('reviews.index') }}" class="inline-flex items-center px-8 py-3 bg-white text-brand-green font-bold border-2 border-brand-green rounded-full hover:bg-brand-green hover:text-white transition-all duration-300">
                Tulis Ulasan Anda <i data-lucide="chevron-right" class="w-4 h-4 ml-2"></i>
            </a>
        </div>
    </div>
</div>
@endif

<!-- Logo Slider -->
<div class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <p class="text-center text-xs font-bold text-gray-400 uppercase tracking-[0.5em] mb-12">Instansi Terkait</p>
        <div class="flex flex-wrap justify-center items-center gap-10 md:gap-20 opacity-40 grayscale hover:opacity-100 hover:grayscale-0 transition-all duration-700">
            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/4/46/Logo_Kementerian_Agama.svg/1200px-Logo_Kementerian_Agama.svg.png" alt="Kemenag" class="h-14 w-auto hover:scale-110 transition">
            <img src="https://sumenepkab.go.id/favicon.png" alt="Pemkab Sumenep" class="h-14 w-auto hover:scale-110 transition">
            <img src="https://jatim.kemenag.go.id/img/logo-kemenag.png" alt="Kanwil Jatim" class="h-14 w-auto hover:scale-110 transition">
            <img src="https://ppid.kemenag.go.id/assets/images/logo_ppid_kemenag.png" alt="PPID Kemenag" class="h-14 w-auto hover:scale-110 transition">
        </div>
    </div>
</div>
@endsection
