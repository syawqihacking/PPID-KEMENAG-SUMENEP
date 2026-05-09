@extends('layouts.app')

@section('content')
<div class="bg-gray-50 py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Breadcrumbs -->
        <nav class="flex text-sm text-gray-500 mb-6">
            <ol class="flex items-center space-x-2">
                <li><a href="{{ route('home') }}" class="hover:text-brand-green">Home</a></li>
                <li><i data-lucide="chevron-right" class="w-4 h-4"></i></li>
                <li><a href="{{ route('home') }}#news" class="hover:text-brand-green">News</a></li>
                <li><i data-lucide="chevron-right" class="w-4 h-4"></i></li>
                <li class="text-gray-900 font-medium">Detail</li>
            </ol>
        </nav>

        <div class="flex flex-col lg:flex-row gap-8">
            <!-- Main Content -->
            <div class="lg:w-2/3">
                <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4 leading-tight">Implementasi Keterbukaan Informasi Publik di Lingkungan Kemenag Sumenep</h1>
                
                <div class="flex items-center gap-4 text-sm text-gray-600 mb-6 border-b border-gray-200 pb-6">
                    <div class="flex items-center gap-1.5"><i data-lucide="user" class="w-4 h-4"></i> Humas Kemenag</div>
                    <div class="flex items-center gap-1.5"><i data-lucide="calendar" class="w-4 h-4"></i> 12 Oktober 2024</div>
                    <div class="flex items-center gap-1.5"><i data-lucide="folder" class="w-4 h-4"></i> <span class="bg-gray-100 px-2 py-0.5 rounded text-gray-800">Berita Utama</span></div>
                </div>

                <div class="mb-8 rounded-xl overflow-hidden bg-gray-200">
                    <img src="https://images.unsplash.com/photo-1542744173-8e7e53415bb0?auto=format&fit=crop&q=80" alt="News Image" class="w-full h-auto object-cover">
                </div>

                <div class="prose prose-lg text-gray-700 max-w-none">
                    <p class="mb-4">Sumenep &mdash; Kementerian Agama (Kemenag) Kabupaten Sumenep terus berkomitmen untuk meningkatkan layanan informasi publik kepada masyarakat. Hal ini diwujudkan melalui penguatan peran Pejabat Pengelola Informasi dan Dokumentasi (PPID) dalam menyediakan informasi yang akurat, transparan, dan mudah diakses.</p>
                    
                    <p class="mb-6">Kepala Kemenag Sumenep dalam sambutannya pada acara sosialisasi keterbukaan informasi yang digelar hari ini, menegaskan pentingnya akses informasi bagi publik. "Keterbukaan informasi bukan sekadar kewajiban regulasi, melainkan fondasi kepercayaan masyarakat terhadap institusi pemerintah. Kami berupaya agar setiap layanan dan program kerja Kemenag Sumenep dapat diketahui secara luas," ujarnya.</p>
                    
                    <h3 class="text-2xl font-bold text-gray-900 mt-8 mb-4">Langkah Strategis Peningkatan Layanan</h3>
                    <p class="mb-4">Beberapa langkah strategis yang telah diambil antara lain pembaruan sistem portal PPID yang kini lebih responsif dan ramah pengguna. Selain itu, dilakukan juga bimbingan teknis bagi seluruh satuan kerja di bawah Kemenag Sumenep untuk memastikan standar pelayanan informasi yang seragam dan berkualitas.</p>
                    
                    <ul class="list-disc pl-6 mb-6 space-y-2">
                        <li>Digitalisasi arsip dokumen publik untuk pencarian yang lebih cepat.</li>
                        <li>Penyediaan desk layanan informasi langsung di kantor pelayanan terpadu.</li>
                        <li>Integrasi sistem pelaporan berbasis web yang dapat diakses melalui perangkat seluler.</li>
                    </ul>
                    
                    <p>Diharapkan dengan adanya perbaikan sistem ini, indeks kepuasan masyarakat terhadap layanan informasi di Kemenag Sumenep akan terus meningkat, sejalan dengan visi misi Kementerian Agama Republik Indonesia.</p>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="lg:w-1/3">
                <div class="bg-white border border-gray-200 rounded-xl p-6 shadow-sm sticky top-6">
                    <h3 class="text-xl font-bold text-gray-900 mb-6">Related News</h3>
                    
                    <div class="space-y-6">
                        <!-- Related Item 1 -->
                        <div class="flex gap-4 group cursor-pointer">
                            <div class="w-24 h-24 bg-gray-200 rounded-lg overflow-hidden flex-shrink-0">
                                <img src="https://images.unsplash.com/photo-1434030216411-0b793f4b4173?auto=format&fit=crop&q=80" alt="Thumb" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                            </div>
                            <div>
                                <h4 class="text-sm font-bold text-gray-900 mb-2 leading-snug group-hover:text-brand-green transition">Pendaftaran Haji Tahun 2024 Dibuka dengan Sistem Baru</h4>
                                <div class="text-xs text-gray-500">10 Oktober 2024</div>
                            </div>
                        </div>

                        <!-- Related Item 2 -->
                        <div class="flex gap-4 group cursor-pointer border-t border-gray-100 pt-6">
                            <div class="w-24 h-24 bg-gray-200 rounded-lg overflow-hidden flex-shrink-0">
                                <img src="https://images.unsplash.com/photo-1450101499163-c8848c66ca85?auto=format&fit=crop&q=80" alt="Thumb" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                            </div>
                            <div>
                                <h4 class="text-sm font-bold text-gray-900 mb-2 leading-snug group-hover:text-brand-green transition">Sosialisasi Sertifikasi Halal bagi UMKM Sumenep</h4>
                                <div class="text-xs text-gray-500">05 Oktober 2024</div>
                            </div>
                        </div>

                        <!-- Related Item 3 -->
                        <div class="flex gap-4 group cursor-pointer border-t border-gray-100 pt-6">
                            <div class="w-24 h-24 bg-gray-200 rounded-lg overflow-hidden flex-shrink-0">
                                <img src="https://images.unsplash.com/photo-1577983072965-0d4daebceb44?auto=format&fit=crop&q=80" alt="Thumb" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                            </div>
                            <div>
                                <h4 class="text-sm font-bold text-gray-900 mb-2 leading-snug group-hover:text-brand-green transition">Evaluasi Kinerja Penyuluh Agama Islam Se-Kabupaten</h4>
                                <div class="text-xs text-gray-500">28 September 2024</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
