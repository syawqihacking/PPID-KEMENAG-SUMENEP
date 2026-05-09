@extends('layouts.app')

@section('content')
<div class="bg-gray-50 py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="mb-8" data-aos="fade-up">
            <h1 class="text-3xl md:text-4xl font-bold text-brand-dark mb-4">Public Documents Portal</h1>
            <p class="text-gray-600 max-w-2xl">Access, browse, and download official documents, reports, and standard operating procedures published by the Ministry of Religious Affairs Sumenep.</p>
        </div>

        <div class="bg-white p-4 rounded-xl border border-gray-200 shadow-sm mb-8 flex flex-col md:flex-row gap-4 items-center justify-between" data-aos="fade-up" data-aos-delay="100">
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

        <!-- Search & Filter Form -->
        <div class="bg-white p-6 rounded-xl border border-gray-200 shadow-sm mb-8" data-aos="fade-up" data-aos-delay="50">
            <form action="{{ route('documents.index') }}" method="GET" class="flex flex-col md:flex-row gap-4">
                <div class="flex-grow relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i data-lucide="search" class="h-5 w-5 text-gray-400"></i>
                    </div>
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama dokumen..." class="block w-full pl-10 pr-3 py-2.5 border border-gray-300 rounded-lg focus:ring-brand-green focus:border-brand-green">
                </div>
                <div class="md:w-48">
                    <select name="category" class="block w-full py-2.5 px-3 border border-gray-300 bg-white rounded-lg focus:ring-brand-green focus:border-brand-green">
                        <option value="">Semua Kategori</option>
                        <option value="Keuangan" {{ request('category') == 'Keuangan' ? 'selected' : '' }}>Keuangan</option>
                        <option value="Kepegawaian" {{ request('category') == 'Kepegawaian' ? 'selected' : '' }}>Kepegawaian</option>
                        <option value="Program" {{ request('category') == 'Program' ? 'selected' : '' }}>Program</option>
                        <option value="Umum" {{ request('category') == 'Umum' ? 'selected' : '' }}>Umum</option>
                    </select>
                </div>
                <button type="submit" class="bg-brand-dark hover:bg-green-900 text-white font-medium py-2.5 px-6 rounded-lg shadow-sm transition">
                    Filter
                </button>
            </form>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-12">
            @forelse($documents as $index => $doc)
            <!-- Card -->
            <div class="bg-white border border-gray-200 rounded-xl p-6 flex flex-col hover:shadow-lg transition duration-300 transform hover:-translate-y-1" data-aos="fade-up" data-aos-delay="{{ 100 * ($index + 1) }}">
                <div class="flex justify-between items-start mb-4">
                    @php
                        $ext = strtoupper($doc->file_extension);
                        $colorClass = 'bg-gray-50 text-gray-600 border-gray-100';
                        if($ext == 'PDF') $colorClass = 'bg-green-50 text-brand-green border-green-100';
                        elseif(in_array($ext, ['DOC', 'DOCX'])) $colorClass = 'bg-orange-50 text-orange-600 border-orange-100';
                        elseif(in_array($ext, ['XLS', 'XLSX'])) $colorClass = 'bg-blue-50 text-blue-600 border-blue-100';
                    @endphp
                    <div class="w-10 h-10 rounded flex items-center justify-center border {{ $colorClass }}">
                        <span class="text-xs font-bold">{{ $ext }}</span>
                    </div>
                    <span class="bg-gray-100 text-gray-600 text-xs px-2 py-1 rounded-full font-medium">{{ $doc->category }}</span>
                </div>
                
                <h3 class="text-lg font-bold text-gray-900 mb-2 leading-snug line-clamp-2" title="{{ $doc->title }}">{{ $doc->title }}</h3>
                <p class="text-sm text-gray-600 flex-grow mb-4 line-clamp-2">{{ $doc->description }}</p>
                
                <div class="flex items-center justify-between border-t border-gray-100 pt-4 mt-auto">
                    <span class="text-xs text-gray-500 font-medium">{{ $doc->file_size }}</span>
                    <a href="{{ $doc->file_path }}" class="text-brand-green hover:text-green-800 transition p-2 bg-green-50 hover:bg-green-100 rounded-lg">
                        <i data-lucide="download" class="w-4 h-4"></i>
                    </a>
                </div>
            </div>
            @empty
            <div class="col-span-full text-center py-12 text-gray-500">
                Belum ada dokumen yang tersedia.
            </div>
            @endforelse
        </div>

        <!-- Pagination (Static for mockup) -->
        <div class="flex justify-center items-center gap-1" data-aos="fade-up" data-aos-delay="100">
            <button class="w-8 h-8 flex items-center justify-center rounded border border-gray-300 text-gray-500 bg-white hover:bg-gray-50 transition"><i data-lucide="chevron-left" class="w-4 h-4"></i></button>
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
