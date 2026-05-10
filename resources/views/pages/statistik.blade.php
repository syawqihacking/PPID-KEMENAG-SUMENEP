@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<div class="relative bg-gray-900 overflow-hidden">
    <div class="absolute inset-0">
        <img src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?auto=format&fit=crop&q=80" alt="Statistics" class="w-full h-full object-cover opacity-40">
        <div class="absolute inset-0 bg-gradient-to-r from-gray-900/80 to-transparent"></div>
    </div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 lg:py-28">
        <div class="max-w-2xl" data-aos="fade-up">
            <span class="inline-block px-3 py-1 bg-brand-green text-white text-xs font-semibold rounded-full uppercase tracking-wider mb-4">Transparansi</span>
            <h1 class="text-4xl md:text-5xl font-bold text-white leading-tight mb-6">Statistik Layanan</h1>
            <p class="text-lg text-gray-200 mb-4 max-w-xl">Data statistik pelayanan informasi publik PPID Kemenag Sumenep — menunjukkan komitmen kami terhadap transparansi.</p>
        </div>
    </div>
</div>

<!-- Stats Overview -->
<div class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl font-bold text-gray-900 mb-2 text-center" data-aos="fade-up">Ringkasan Data</h2>
        <p class="text-gray-600 mb-12 text-center" data-aos="fade-up" data-aos-delay="100">Data layanan informasi publik tahun {{ date('Y') }}.</p>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-16">
            <div class="bg-white border border-gray-200 rounded-xl p-6 hover:shadow-lg transition duration-300 transform hover:-translate-y-1 text-center" data-aos="fade-up" data-aos-delay="100">
                <div class="w-12 h-12 bg-green-50 rounded-lg flex items-center justify-center mx-auto mb-4 text-brand-green">
                    <i data-lucide="inbox" class="w-6 h-6"></i>
                </div>
                <div class="text-3xl font-bold text-gray-900 mb-1">{{ $totalRequests }}</div>
                <p class="text-sm text-gray-500">Total Permohonan</p>
            </div>
            <div class="bg-white border border-gray-200 rounded-xl p-6 hover:shadow-lg transition duration-300 transform hover:-translate-y-1 text-center" data-aos="fade-up" data-aos-delay="200">
                <div class="w-12 h-12 bg-green-50 rounded-lg flex items-center justify-center mx-auto mb-4 text-green-600">
                    <i data-lucide="check-circle" class="w-6 h-6"></i>
                </div>
                <div class="text-3xl font-bold text-gray-900 mb-1">{{ $approvedRequests }}</div>
                <p class="text-sm text-gray-500">Disetujui</p>
            </div>
            <div class="bg-white border border-gray-200 rounded-xl p-6 hover:shadow-lg transition duration-300 transform hover:-translate-y-1 text-center" data-aos="fade-up" data-aos-delay="300">
                <div class="w-12 h-12 bg-yellow-50 rounded-lg flex items-center justify-center mx-auto mb-4 text-yellow-600">
                    <i data-lucide="clock" class="w-6 h-6"></i>
                </div>
                <div class="text-3xl font-bold text-gray-900 mb-1">{{ $pendingRequests }}</div>
                <p class="text-sm text-gray-500">Sedang Diproses</p>
            </div>
            <div class="bg-white border border-gray-200 rounded-xl p-6 hover:shadow-lg transition duration-300 transform hover:-translate-y-1 text-center" data-aos="fade-up" data-aos-delay="400">
                <div class="w-12 h-12 bg-red-50 rounded-lg flex items-center justify-center mx-auto mb-4 text-red-500">
                    <i data-lucide="x-circle" class="w-6 h-6"></i>
                </div>
                <div class="text-3xl font-bold text-gray-900 mb-1">{{ $rejectedRequests }}</div>
                <p class="text-sm text-gray-500">Ditolak</p>
            </div>
        </div>

        <!-- Additional Stats -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div data-aos="fade-up">
                <div class="flex justify-between items-end mb-6 border-b border-gray-200 pb-4">
                    <div>
                        <h2 class="text-2xl font-bold text-gray-900 mb-1">Konten Publik</h2>
                        <p class="text-sm text-gray-600">Jumlah informasi yang tersedia untuk publik.</p>
                    </div>
                </div>
                <div class="space-y-4">
                    <div class="flex justify-between items-center bg-white border border-gray-200 rounded-xl p-5">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-green-50 rounded-lg flex items-center justify-center text-brand-green"><i data-lucide="newspaper" class="w-5 h-5"></i></div>
                            <span class="font-medium text-gray-900">Berita Dipublikasikan</span>
                        </div>
                        <span class="text-2xl font-bold text-gray-900">{{ $totalNews }}</span>
                    </div>
                    <div class="flex justify-between items-center bg-white border border-gray-200 rounded-xl p-5">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-yellow-50 rounded-lg flex items-center justify-center text-yellow-600"><i data-lucide="file-text" class="w-5 h-5"></i></div>
                            <span class="font-medium text-gray-900">Dokumen Tersedia</span>
                        </div>
                        <span class="text-2xl font-bold text-gray-900">{{ $totalDocuments }}</span>
                    </div>
                </div>
            </div>

            <div data-aos="fade-up" data-aos-delay="100">
                <div class="flex justify-between items-end mb-6 border-b border-gray-200 pb-4">
                    <div>
                        <h2 class="text-2xl font-bold text-gray-900 mb-1">Tingkat Penyelesaian</h2>
                        <p class="text-sm text-gray-600">Rasio penyelesaian permohonan informasi.</p>
                    </div>
                </div>
                <div class="bg-white border border-gray-200 rounded-xl p-8 text-center">
                    <div class="text-5xl font-bold text-brand-green mb-2">
                        {{ $totalRequests > 0 ? round(($approvedRequests / $totalRequests) * 100) : 0 }}%
                    </div>
                    <p class="text-gray-500 mb-6">Permohonan berhasil dipenuhi</p>
                    <div class="w-full bg-gray-200 rounded-full h-3">
                        <div class="bg-brand-green h-3 rounded-full transition-all duration-1000" style="width: {{ $totalRequests > 0 ? round(($approvedRequests / $totalRequests) * 100) : 0 }}%"></div>
                    </div>
                    <div class="flex justify-between text-xs text-gray-400 mt-2">
                        <span>0%</span>
                        <span>100%</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
