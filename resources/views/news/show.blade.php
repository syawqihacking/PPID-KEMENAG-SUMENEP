@extends('layouts.app')

@section('title', $news->title . ' - PPID Kemenag Sumenep')
@section('meta_description', \Illuminate\Support\Str::limit(strip_tags($news->content), 160))
@section('meta_image', $news->image_path)

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
            <div class="lg:w-2/3" data-aos="fade-right">
                <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4 leading-tight">{{ $news->title }}</h1>
                
                <div class="flex items-center gap-4 text-sm text-gray-600 mb-6 border-b border-gray-200 pb-6">
                    <div class="flex items-center gap-1.5"><i data-lucide="user" class="w-4 h-4"></i> {{ $news->author_name }}</div>
                    <div class="flex items-center gap-1.5"><i data-lucide="calendar" class="w-4 h-4"></i> {{ \Carbon\Carbon::parse($news->published_at)->format('d F Y') }}</div>
                    @if($news->category)
                    <div class="flex items-center gap-1.5"><i data-lucide="folder" class="w-4 h-4"></i> <span class="bg-gray-100 px-2 py-0.5 rounded text-gray-800">{{ $news->category }}</span></div>
                    @endif
                </div>

                @if($news->image_path)
                <div class="mb-8 rounded-xl overflow-hidden bg-gray-200">
                    <img src="{{ $news->image_path }}" alt="{{ $news->title }}" class="w-full h-auto object-cover hover:scale-105 transition duration-700">
                </div>
                @endif

                <div class="prose prose-lg text-gray-700 max-w-none mb-12">
                    {!! nl2br(e($news->content)) !!}
                </div>

                <!-- Share Buttons -->
                <div class="mt-12 pt-8 border-t border-gray-100">
                    <p class="text-sm font-bold text-gray-400 uppercase tracking-widest mb-6">Bagikan Berita Ini:</p>
                    <div class="flex flex-wrap gap-4">
                        <a href="https://wa.me/?text={{ urlencode($news->title . ' - ' . url()->current()) }}" target="_blank" class="flex items-center gap-2 px-5 py-2.5 bg-[#25D366] text-white rounded-xl font-bold text-sm hover:scale-105 transition shadow-lg shadow-green-200">
                            <i data-lucide="message-circle" class="w-4 h-4"></i> WhatsApp
                        </a>
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}" target="_blank" class="flex items-center gap-2 px-5 py-2.5 bg-[#1877F2] text-white rounded-xl font-bold text-sm hover:scale-105 transition shadow-lg shadow-blue-200">
                            <i data-lucide="facebook" class="w-4 h-4"></i> Facebook
                        </a>
                        <a href="https://twitter.com/intent/tweet?text={{ urlencode($news->title) }}&url={{ urlencode(url()->current()) }}" target="_blank" class="flex items-center gap-2 px-5 py-2.5 bg-[#000000] text-white rounded-xl font-bold text-sm hover:scale-105 transition shadow-lg shadow-gray-200">
                            <i data-lucide="twitter" class="w-4 h-4"></i> Twitter
                        </a>
                        <button onclick="copyToClipboard()" class="flex items-center gap-2 px-5 py-2.5 bg-gray-100 text-gray-700 rounded-xl font-bold text-sm hover:bg-gray-200 transition">
                            <i data-lucide="copy" class="w-4 h-4"></i> <span id="copy-text">Salin Link</span>
                        </button>
                    </div>
                </div>

                <script>
                    function copyToClipboard() {
                        const el = document.createElement('textarea');
                        el.value = window.location.href;
                        document.body.appendChild(el);
                        el.select();
                        document.execCommand('copy');
                        document.body.removeChild(el);
                        
                        const btnText = document.getElementById('copy-text');
                        btnText.innerText = 'Tersalin!';
                        setTimeout(() => {
                            btnText.innerText = 'Salin Link';
                        }, 2000);
                    }
                </script>
            </div>

            <!-- Sidebar -->
            <div class="lg:w-1/3" data-aos="fade-left" data-aos-delay="200">
                <div class="bg-white border border-gray-200 rounded-xl p-6 shadow-sm sticky top-6 hover:shadow-md transition duration-300">
                    <h3 class="text-xl font-bold text-gray-900 mb-6">Related News</h3>
                    
                    <div class="space-y-6">
                        @foreach($relatedNews as $index => $rel)
                        <!-- Related Item -->
                        <a href="{{ route('news.show', $rel->slug) }}" class="flex gap-4 group cursor-pointer {{ $index > 0 ? 'border-t border-gray-100 pt-6' : '' }}">
                            <div class="w-24 h-24 bg-gray-200 rounded-lg overflow-hidden flex-shrink-0">
                                @if($rel->image_path)
                                <img src="{{ $rel->image_path }}" alt="Thumb" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                                @else
                                <div class="w-full h-full flex items-center justify-center text-gray-400"><i data-lucide="image" class="w-8 h-8"></i></div>
                                @endif
                            </div>
                            <div>
                                <h4 class="text-sm font-bold text-gray-900 mb-2 leading-snug group-hover:text-brand-green transition">{{ $rel->title }}</h4>
                                <div class="text-xs text-gray-500">{{ \Carbon\Carbon::parse($rel->published_at)->format('d F Y') }}</div>
                            </div>
                        </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
