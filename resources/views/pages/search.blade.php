@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<div class="relative bg-brand-dark py-12 border-b border-gray-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center" data-aos="fade-down">
        <h1 class="text-3xl font-bold text-white mb-4">Hasil Pencarian</h1>
        <form action="{{ route('search') }}" method="GET" class="max-w-2xl mx-auto">
            <div class="relative">
                <input type="text" name="q" value="{{ $q }}" placeholder="Cari informasi, berita, atau dokumen..." class="w-full pl-5 pr-12 py-3 rounded-full border-0 shadow-lg text-gray-900 focus:ring-2 focus:ring-brand-green" required minlength="2">
                <button type="submit" class="absolute right-3 top-2.5 text-gray-400 hover:text-brand-green">
                    <i data-lucide="search" class="w-6 h-6"></i>
                </button>
            </div>
        </form>
        @if($q)
            <p class="text-green-50 mt-4 text-sm">Menampilkan hasil untuk: <strong>"{{ $q }}"</strong></p>
        @endif
    </div>
</div>

<div class="py-12 bg-gray-50 min-h-[50vh]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        @if(!$q || strlen($q) < 2)
            <div class="text-center py-20 text-gray-500">
                <i data-lucide="search" class="w-16 h-16 mx-auto mb-4 text-gray-300"></i>
                <p class="text-lg">Silakan masukkan minimal 2 karakter untuk melakukan pencarian.</p>
            </div>
        @elseif($news->isEmpty() && $documents->isEmpty())
            <div class="text-center py-20 text-gray-500">
                <i data-lucide="file-question" class="w-16 h-16 mx-auto mb-4 text-gray-300"></i>
                <h3 class="text-xl font-bold text-gray-700 mb-2">Tidak ada hasil ditemukan</h3>
                <p>Maaf, kami tidak dapat menemukan informasi yang cocok dengan kata kunci "{{ $q }}".<br>Silakan coba dengan kata kunci lain.</p>
            </div>
        @else
            <!-- Hasil Berita -->
            @if($news->isNotEmpty())
            <div class="mb-12">
                <h2 class="text-xl font-bold text-gray-900 mb-6 flex items-center gap-2 border-b border-gray-200 pb-2">
                    <i data-lucide="newspaper" class="w-5 h-5 text-brand-green"></i> Berita & Artikel ({{ $news->count() }})
                </h2>
                <div class="space-y-4">
                    @foreach($news as $item)
                    <a href="{{ route('news.show', $item->slug) }}" class="block bg-white p-6 rounded-xl border border-gray-200 hover:shadow-md transition">
                        <h3 class="text-lg font-bold text-brand-dark mb-2">{{ $item->title }}</h3>
                        <p class="text-sm text-gray-500 mb-2">{{ $item->published_at->format('d M Y') }}</p>
                        <p class="text-gray-600 text-sm line-clamp-2">{{ Str::limit(strip_tags($item->content), 150) }}</p>
                    </a>
                    @endforeach
                </div>
            </div>
            @endif

            <!-- Hasil Dokumen -->
            @if($documents->isNotEmpty())
            <div>
                <h2 class="text-xl font-bold text-gray-900 mb-6 flex items-center gap-2 border-b border-gray-200 pb-2">
                    <i data-lucide="file-text" class="w-5 h-5 text-yellow-600"></i> Dokumen Publik ({{ $documents->count() }})
                </h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($documents as $doc)
                    <div class="bg-white p-6 rounded-xl border border-gray-200 hover:shadow-md transition flex flex-col h-full">
                        <div class="flex-grow">
                            <span class="inline-block px-2 py-1 bg-gray-100 text-gray-600 text-xs rounded mb-3">{{ $doc->category }}</span>
                            <h3 class="font-bold text-gray-900 mb-2">{{ $doc->title }}</h3>
                            <p class="text-gray-500 text-sm mb-4 line-clamp-2">{{ $doc->description }}</p>
                        </div>
                        <div class="mt-4 pt-4 border-t border-gray-100 flex justify-between items-center">
                            <span class="text-xs text-gray-400">{{ $doc->created_at->format('d M Y') }}</span>
                            <a href="{{ Storage::url($doc->file_path) }}" target="_blank" class="text-brand-green hover:text-green-800 text-sm font-medium flex items-center gap-1">
                                <i data-lucide="download" class="w-4 h-4"></i> Unduh
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif

        @endif
    </div>
</div>
@endsection
