@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<div class="relative bg-gray-900 overflow-hidden">
    <div class="absolute inset-0">
        <img src="https://images.unsplash.com/photo-1519389950473-47ba0277781c?auto=format&fit=crop&q=80" alt="Reviews" class="w-full h-full object-cover opacity-40">
        <div class="absolute inset-0 bg-gradient-to-r from-gray-900/80 to-transparent"></div>
    </div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 lg:py-28">
        <div class="max-w-2xl" data-aos="fade-up">
            <span class="inline-block px-3 py-1 bg-brand-green text-white text-xs font-semibold rounded-full uppercase tracking-wider mb-4">Ulasan Layanan</span>
            <h1 class="text-4xl md:text-5xl font-bold text-white leading-tight mb-6">Suara Anda, Kebanggaan Kami</h1>
            <p class="text-lg text-gray-200 mb-4 max-w-xl">Berikan penilaian dan komentar Anda terkait pelayanan informasi publik PPID Kemenag Sumenep.</p>
        </div>
    </div>
</div>

<div class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
            <!-- Form Section -->
            <div class="lg:col-span-1">
                <div class="sticky top-24">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Beri Penilaian</h2>
                    
                    @if(session('success'))
                    <div class="mb-6 bg-green-50 border border-green-200 text-green-800 px-4 py-3 rounded-lg flex items-center gap-2">
                        <i data-lucide="check-circle" class="w-5 h-5"></i> {{ session('success') }}
                    </div>
                    @endif

                    <form action="{{ route('reviews.store') }}" method="POST" class="bg-gray-50 border border-gray-100 rounded-2xl p-8 shadow-sm">
                        @csrf
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Lengkap</label>
                                <input type="text" name="name" required class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:ring-brand-green focus:border-brand-green transition" placeholder="Nama Anda">
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Rating</label>
                                <div class="flex gap-2">
                                    @for($i = 1; $i <= 5; $i++)
                                    <label class="cursor-pointer">
                                        <input type="radio" name="rating" value="{{ $i }}" class="hidden peer" required>
                                        <div class="w-10 h-10 flex items-center justify-center rounded-lg border border-gray-200 peer-checked:bg-brand-green peer-checked:text-white peer-checked:border-brand-green hover:bg-gray-100 transition">
                                            {{ $i }}
                                        </div>
                                    </label>
                                    @endfor
                                </div>
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Komentar / Saran</label>
                                <textarea name="comment" rows="4" required class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:ring-brand-green focus:border-brand-green transition" placeholder="Ceritakan pengalaman Anda..."></textarea>
                            </div>
                            <button type="submit" class="w-full bg-brand-dark hover:bg-green-900 text-white font-bold py-3 px-6 rounded-xl transition transform hover:scale-[1.02] shadow-md">
                                Kirim Ulasan
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- List Section -->
            <div class="lg:col-span-2">
                <div class="flex flex-col md:flex-row md:items-center justify-between mb-8 gap-4">
                    <h2 class="text-2xl font-bold text-gray-900">Apa Kata Mereka?</h2>
                    
                    @if($totalReviews > 0)
                    <div class="flex items-center gap-4 bg-green-50 px-4 py-2 rounded-xl border border-green-100">
                        <div class="text-3xl font-bold text-brand-green">{{ number_format($averageRating, 1) }}</div>
                        <div>
                            <div class="flex text-yellow-400">
                                @for($i = 1; $i <= 5; $i++)
                                <i data-lucide="star" class="w-4 h-4 {{ $i <= round($averageRating) ? 'fill-current' : 'text-gray-200' }}"></i>
                                @endfor
                            </div>
                            <p class="text-xs text-gray-500">{{ $totalReviews }} Ulasan Masuk</p>
                        </div>
                    </div>
                    @endif
                </div>
                
                <div class="space-y-6">
                    @forelse($reviews as $review)
                    <div class="bg-white border border-gray-100 rounded-2xl p-6 shadow-sm hover:shadow-md transition" data-aos="fade-up">
                        <div class="flex justify-between items-start mb-4">
                            <div>
                                <h3 class="font-bold text-gray-900 text-lg">{{ $review->name }}</h3>
                                <p class="text-xs text-gray-400">{{ $review->created_at->diffForHumans() }}</p>
                            </div>
                            <div class="flex text-yellow-400">
                                @for($i = 1; $i <= 5; $i++)
                                <i data-lucide="star" class="w-4 h-4 {{ $i <= $review->rating ? 'fill-current' : 'text-gray-200' }}"></i>
                                @endfor
                            </div>
                        </div>
                        <p class="text-gray-600 italic leading-relaxed">"{{ $review->comment }}"</p>
                    </div>
                    @empty
                    <div class="text-center py-12 bg-gray-50 rounded-2xl border border-dashed border-gray-200">
                        <i data-lucide="message-square" class="w-12 h-12 text-gray-300 mx-auto mb-4"></i>
                        <p class="text-gray-500">Belum ada ulasan yang ditampilkan.</p>
                    </div>
                    @endforelse
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
