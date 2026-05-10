@extends('layouts.app')

@section('content')
<div class="bg-gray-50 py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="flex flex-col md:flex-row md:items-center justify-between mb-12 gap-6" data-aos="fade-up">
            <div class="border-b border-gray-200 pb-6 md:border-0 md:pb-0">
                <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Berita & Pengumuman</h1>
                <p class="text-gray-600 max-w-2xl text-lg">Ikuti perkembangan terbaru, kegiatan, dan pengumuman resmi dari lingkungan Kementerian Agama Kabupaten Sumenep.</p>
            </div>
            
            <form action="{{ route('news.index') }}" method="GET" class="flex gap-2">
                <div class="w-48">
                    <select name="category" onchange="this.form.submit()" class="block w-full py-2.5 px-3 border border-gray-300 bg-white rounded-lg focus:ring-brand-green focus:border-brand-green text-sm">
                        <option value="">Semua Kategori</option>
                        @foreach($categories as $category)
                        <option value="{{ $category }}" {{ request('category') == $category ? 'selected' : '' }}>{{ $category }}</option>
                        @endforeach
                    </select>
                </div>
            </form>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($news as $index => $newsItem)
            <!-- News Card -->
            <a href="{{ route('news.show', $newsItem->slug) }}" class="bg-white border border-gray-200 rounded-xl overflow-hidden shadow-sm hover:shadow-lg transition duration-300 transform hover:-translate-y-1 flex flex-col group" data-aos="fade-up" data-aos-delay="{{ 100 * ($index % 3 + 1) }}">
                <div class="relative h-56 bg-gray-200 overflow-hidden">
                    <img src="{{ $newsItem->image_path }}" alt="{{ $newsItem->title }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                    @if($newsItem->category)
                    <span class="absolute top-4 left-4 bg-brand-green text-white text-xs font-semibold px-3 py-1.5 rounded-full shadow-sm">{{ $newsItem->category }}</span>
                    @endif
                </div>
                <div class="p-6 flex-grow flex flex-col">
                    <div class="flex items-center gap-2 text-xs text-gray-500 mb-3">
                        <i data-lucide="calendar" class="w-3.5 h-3.5"></i>
                        <span>{{ \Carbon\Carbon::parse($newsItem->published_at)->format('d F Y') }}</span>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3 leading-snug group-hover:text-brand-green transition">{{ $newsItem->title }}</h3>
                    <p class="text-sm text-gray-600 line-clamp-3 mb-4">{{ Str::limit(strip_tags($newsItem->content), 120) }}</p>
                    
                    <div class="mt-auto pt-4 border-t border-gray-100 flex items-center text-sm font-medium text-brand-green">
                        Baca Selengkapnya <i data-lucide="arrow-right" class="w-4 h-4 ml-1 group-hover:translate-x-1 transition"></i>
                    </div>
                </div>
            </a>
            @empty
            <div class="col-span-full py-12 text-center text-gray-500 bg-white rounded-xl border border-gray-200" data-aos="fade-up">
                <i data-lucide="inbox" class="w-12 h-12 mx-auto mb-3 text-gray-300"></i>
                <p>Belum ada berita yang diterbitkan.</p>
            </div>
            @endforelse
        </div>

        <!-- Pagination -->
        <div class="mt-12 flex justify-center" data-aos="fade-up">
            {{ $news->links('pagination::tailwind') }}
        </div>
        
    </div>
</div>
@endsection
