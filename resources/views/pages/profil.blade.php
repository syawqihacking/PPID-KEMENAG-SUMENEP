@extends('layouts.app')

@section('content')
<!-- Hero Section - matching home style -->
<div class="relative bg-gray-900 overflow-hidden">
    <div class="absolute inset-0">
        <img src="https://images.unsplash.com/photo-1497366216548-37526070297c?auto=format&fit=crop&q=80" alt="Office Building" class="w-full h-full object-cover opacity-40">
        <div class="absolute inset-0 bg-gradient-to-r from-gray-900/80 to-transparent"></div>
    </div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 lg:py-28">
        <div class="max-w-2xl" data-aos="fade-up">
            <span class="inline-block px-3 py-1 bg-brand-green text-white text-xs font-semibold rounded-full uppercase tracking-wider mb-4">Tentang Kami</span>
            <h1 class="text-4xl md:text-5xl font-bold text-white leading-tight mb-6">
                Profil PPID
            </h1>
            <p class="text-lg text-gray-200 mb-4 max-w-xl">
                Mengenal lebih dekat Pejabat Pengelola Informasi dan Dokumentasi (PPID) di lingkungan Kementerian Agama Kabupaten Sumenep.
            </p>
        </div>
    </div>
</div>

<!-- Latar Belakang -->
<div class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-3xl" data-aos="fade-up">
            <h2 class="text-3xl font-bold text-gray-900 mb-6">Latar Belakang</h2>
            <div class="text-gray-600 leading-relaxed text-lg prose">
                {!! nl2br(e($settings['profil_latar_belakang'] ?? 'Berdasarkan Undang-Undang Nomor 14 Tahun 2008 tentang Keterbukaan Informasi Publik (KIP), Kementerian Agama Kabupaten Sumenep berkomitmen untuk memberikan pelayanan informasi publik yang cepat, tepat, dan sederhana.')) !!}
            </div>
        </div>
    </div>
</div>

<!-- Visi & Misi -->
<div class="py-16 bg-gray-50 border-t border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl font-bold text-gray-900 mb-2 text-center" data-aos="fade-up">Visi & Misi</h2>
        <p class="text-gray-600 mb-12 text-center" data-aos="fade-up" data-aos-delay="100">Dasar penyelenggaraan layanan informasi publik PPID Kemenag Sumenep.</p>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Visi -->
            <div class="bg-white border border-gray-200 rounded-xl p-8 hover:shadow-lg transition duration-300 transform hover:-translate-y-1" data-aos="fade-up" data-aos-delay="100">
                <div class="w-12 h-12 bg-green-50 rounded-lg flex items-center justify-center mb-6 text-brand-green">
                    <i data-lucide="eye" class="w-6 h-6"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Visi</h3>
                <p class="text-gray-600 italic leading-relaxed border-l-4 border-brand-green pl-4">
                    "{!! nl2br(e($settings['profil_visi'] ?? 'Terwujudnya pelayanan informasi yang transparan, akuntabel, dan responsif.')) !!}"
                </p>
            </div>

            <!-- Misi -->
            <div class="bg-white border border-gray-200 rounded-xl p-8 hover:shadow-lg transition duration-300 transform hover:-translate-y-1" data-aos="fade-up" data-aos-delay="200">
                <div class="w-12 h-12 bg-green-50 rounded-lg flex items-center justify-center mb-6 text-brand-green">
                    <i data-lucide="target" class="w-6 h-6"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Misi</h3>
                <ul class="text-gray-600 space-y-3">
                    @php
                        $misiList = explode("\n", $settings['profil_misi'] ?? 'Meningkatkan kualitas pelayanan informasi publik.');
                    @endphp
                    @foreach($misiList as $misi)
                        @if(trim($misi) != '')
                        <li class="flex items-start gap-3">
                            <i data-lucide="check" class="w-5 h-5 text-brand-green shrink-0 mt-0.5"></i>
                            <span>{{ trim($misi) }}</span>
                        </li>
                        @endif
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>

<!-- Struktur Organisasi -->
<div class="py-16 bg-white border-t border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-end mb-8 border-b border-gray-200 pb-4" data-aos="fade-up">
            <div>
                <h2 class="text-2xl font-bold text-gray-900 mb-1">Struktur Organisasi</h2>
                <p class="text-sm text-gray-600">Susunan organisasi PPID Kementerian Agama Kabupaten Sumenep.</p>
            </div>
            <a href="#" class="mt-4 md:mt-0 text-sm font-medium text-gray-600 hover:text-brand-green flex items-center gap-1">
                <i data-lucide="download" class="w-4 h-4"></i> Unduh SK PPID
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6" data-aos="fade-up" data-aos-delay="100">
            <!-- Atasan PPID -->
            <div class="bg-white border border-gray-200 rounded-xl p-6 hover:shadow-lg transition duration-300 transform hover:-translate-y-1 text-center">
                <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4 text-gray-400">
                    <i data-lucide="user-circle" class="w-8 h-8"></i>
                </div>
                <h4 class="font-semibold text-gray-900 mb-1">Atasan PPID</h4>
                <p class="text-sm text-gray-500 mb-2">Kepala Kantor Kemenag</p>
                <span class="inline-block px-3 py-1 bg-green-50 text-brand-green text-xs font-medium rounded-full">Penanggungjawab</span>
            </div>

            <!-- PPID -->
            <div class="bg-white border border-gray-200 rounded-xl p-6 hover:shadow-lg transition duration-300 transform hover:-translate-y-1 text-center">
                <div class="w-16 h-16 bg-green-50 rounded-full flex items-center justify-center mx-auto mb-4 text-brand-green">
                    <i data-lucide="user-check" class="w-8 h-8"></i>
                </div>
                <h4 class="font-semibold text-gray-900 mb-1">Pejabat PPID</h4>
                <p class="text-sm text-gray-500 mb-2">Kasubbag Tata Usaha</p>
                <span class="inline-block px-3 py-1 bg-brand-green text-white text-xs font-medium rounded-full">Pengelola Utama</span>
            </div>

            <!-- Tim Pelaksana -->
            <div class="bg-white border border-gray-200 rounded-xl p-6 hover:shadow-lg transition duration-300 transform hover:-translate-y-1 text-center">
                <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4 text-gray-400">
                    <i data-lucide="users" class="w-8 h-8"></i>
                </div>
                <h4 class="font-semibold text-gray-900 mb-1">Tim Pelaksana</h4>
                <p class="text-sm text-gray-500 mb-2">Staf Pengelola Informasi</p>
                <span class="inline-block px-3 py-1 bg-yellow-50 text-yellow-700 text-xs font-medium rounded-full">Pelaksana Teknis</span>
            </div>
        </div>
    </div>
</div>
@endsection
