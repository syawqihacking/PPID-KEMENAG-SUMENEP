@extends('layouts.app')

@section('content')
<div class="bg-gray-50 py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="mb-8">
            <h1 class="text-3xl md:text-4xl font-bold text-brand-dark mb-4">Public Documents Portal</h1>
            <p class="text-gray-600 max-w-2xl">Access, browse, and download official documents, reports, and standard operating procedures published by the Ministry of Religious Affairs Sumenep.</p>
        </div>

        <div class="bg-white p-4 rounded-xl border border-gray-200 shadow-sm mb-8 flex flex-col md:flex-row gap-4 items-center justify-between">
            <div class="relative w-full md:w-96">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <i data-lucide="search" class="text-gray-400 w-5 h-5"></i>
                </div>
                <input type="text" placeholder="Search by document title, reference number, or keyword..." class="w-full pl-10 pr-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-1 focus:ring-brand-green focus:border-brand-green text-sm">
            </div>
            
            <div class="flex gap-2 w-full md:w-auto overflow-x-auto pb-2 md:pb-0 hide-scroll">
                <button class="px-4 py-1.5 bg-brand-green text-white rounded-full text-xs font-medium whitespace-nowrap shadow-sm">All Categories</button>
                <button class="px-4 py-1.5 bg-white border border-gray-300 text-gray-700 rounded-full text-xs font-medium hover:bg-gray-50 whitespace-nowrap">Kepegawaian</button>
                <button class="px-4 py-1.5 bg-white border border-gray-300 text-gray-700 rounded-full text-xs font-medium hover:bg-gray-50 whitespace-nowrap">Keuangan</button>
                <button class="px-4 py-1.5 bg-white border border-gray-300 text-gray-700 rounded-full text-xs font-medium hover:bg-gray-50 whitespace-nowrap">Program</button>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-12">
            <!-- Card 1 -->
            <div class="bg-white border border-gray-200 rounded-xl p-6 flex flex-col hover:shadow-md transition">
                <div class="flex justify-between items-start mb-4">
                    <div class="w-10 h-10 bg-green-50 rounded text-brand-green flex items-center justify-center border border-green-100">
                        <span class="text-xs font-bold">PDF</span>
                    </div>
                    <span class="bg-green-100 text-brand-green text-[10px] font-semibold px-2 py-0.5 rounded-full">Keuangan</span>
                </div>
                <h3 class="text-lg font-bold text-gray-900 mb-2 leading-snug">Laporan Kinerja Instansi Pemerintah (LKjIP) Tahun...</h3>
                <p class="text-sm text-gray-600 mb-6 flex-grow">Laporan tahunan evaluasi kinerja berdasarkan rencana strategis.</p>
                <div class="flex justify-between items-center pt-4 border-t border-gray-100 mt-auto">
                    <span class="text-xs text-gray-500">PDF &bull; 2.4 MB</span>
                    <button class="bg-brand-dark hover:bg-green-900 text-white px-3 py-1.5 rounded text-sm font-medium flex items-center gap-1 transition shadow-sm"><i data-lucide="download" class="w-4 h-4"></i> Unduh</button>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="bg-white border border-gray-200 rounded-xl p-6 flex flex-col hover:shadow-md transition">
                <div class="flex justify-between items-start mb-4">
                    <div class="w-10 h-10 bg-orange-50 rounded text-orange-600 flex items-center justify-center border border-orange-100">
                        <span class="text-xs font-bold">DOC</span>
                    </div>
                    <span class="bg-gray-100 text-gray-600 text-[10px] font-semibold px-2 py-0.5 rounded-full">Kepegawaian</span>
                </div>
                <h3 class="text-lg font-bold text-gray-900 mb-2 leading-snug">SOP Penanganan Benturan Kepentingan</h3>
                <p class="text-sm text-gray-600 mb-6 flex-grow">Standar operasional prosedur terkait penanganan benturan kepentingan pegawai.</p>
                <div class="flex justify-between items-center pt-4 border-t border-gray-100 mt-auto">
                    <span class="text-xs text-gray-500">DOCX &bull; 1.1 MB</span>
                    <button class="bg-brand-dark hover:bg-green-900 text-white px-3 py-1.5 rounded text-sm font-medium flex items-center gap-1 transition shadow-sm"><i data-lucide="download" class="w-4 h-4"></i> Unduh</button>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="bg-white border border-gray-200 rounded-xl p-6 flex flex-col hover:shadow-md transition">
                <div class="flex justify-between items-start mb-4">
                    <div class="w-10 h-10 bg-green-50 rounded text-brand-green flex items-center justify-center border border-green-100">
                        <span class="text-xs font-bold">PDF</span>
                    </div>
                    <span class="bg-green-100 text-brand-green text-[10px] font-semibold px-2 py-0.5 rounded-full">Program</span>
                </div>
                <h3 class="text-lg font-bold text-gray-900 mb-2 leading-snug">Rencana Strategis (RENSTRA) 2020-2024</h3>
                <p class="text-sm text-gray-600 mb-6 flex-grow">Dokumen perencanaan strategis kementerian agama tingkat kabupaten.</p>
                <div class="flex justify-between items-center pt-4 border-t border-gray-100 mt-auto">
                    <span class="text-xs text-gray-500">PDF &bull; 5.8 MB</span>
                    <button class="bg-brand-dark hover:bg-green-900 text-white px-3 py-1.5 rounded text-sm font-medium flex items-center gap-1 transition shadow-sm"><i data-lucide="download" class="w-4 h-4"></i> Unduh</button>
                </div>
            </div>
            
            <!-- Card 4 -->
            <div class="bg-white border border-gray-200 rounded-xl p-6 flex flex-col hover:shadow-md transition">
                <div class="flex justify-between items-start mb-4">
                    <div class="w-10 h-10 bg-green-50 rounded text-brand-green flex items-center justify-center border border-green-100">
                        <span class="text-xs font-bold">PDF</span>
                    </div>
                    <span class="bg-gray-100 text-gray-600 text-[10px] font-semibold px-2 py-0.5 rounded-full">Keuangan</span>
                </div>
                <h3 class="text-lg font-bold text-gray-900 mb-2 leading-snug">Daftar Isian Pelaksanaan Anggaran (DIPA) 2024</h3>
                <p class="text-sm text-gray-600 mb-6 flex-grow">Rincian alokasi anggaran pelaksanaan program kerja kementerian.</p>
                <div class="flex justify-between items-center pt-4 border-t border-gray-100 mt-auto">
                    <span class="text-xs text-gray-500">PDF &bull; 3.2 MB</span>
                    <button class="bg-brand-dark hover:bg-green-900 text-white px-3 py-1.5 rounded text-sm font-medium flex items-center gap-1 transition shadow-sm"><i data-lucide="download" class="w-4 h-4"></i> Unduh</button>
                </div>
            </div>
            
            {{-- Loop through $documents dynamically here --}}
        </div>

        <!-- Pagination (Static for mockup) -->
        <div class="flex justify-center items-center gap-1">
            <button class="w-8 h-8 flex items-center justify-center rounded border border-gray-300 text-gray-500 bg-white hover:bg-gray-50"><i data-lucide="chevron-left" class="w-4 h-4"></i></button>
            <button class="w-8 h-8 flex items-center justify-center rounded border border-brand-dark bg-brand-dark text-white text-sm font-medium">1</button>
            <button class="w-8 h-8 flex items-center justify-center rounded border border-gray-300 text-gray-700 bg-white hover:bg-gray-50 text-sm font-medium">2</button>
            <button class="w-8 h-8 flex items-center justify-center rounded border border-gray-300 text-gray-700 bg-white hover:bg-gray-50 text-sm font-medium">3</button>
            <span class="px-2 text-gray-500">...</span>
            <button class="w-8 h-8 flex items-center justify-center rounded border border-gray-300 text-gray-500 bg-white hover:bg-gray-50"><i data-lucide="chevron-right" class="w-4 h-4"></i></button>
        </div>

    </div>
</div>
<style>
    .hide-scroll::-webkit-scrollbar { display: none; }
    .hide-scroll { -ms-overflow-style: none; scrollbar-width: none; }
</style>
@endsection
