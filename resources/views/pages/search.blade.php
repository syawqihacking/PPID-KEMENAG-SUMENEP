@extends('layouts.app')

@section('title', 'Hasil Pencarian: ' . $q)

@section('content')
<div class="bg-gray-50 py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="mb-12" data-aos="fade-up">
            <h1 class="text-3xl font-extrabold text-gray-900">Hasil Pencarian untuk: <span class="text-brand-green">"{{ $q }}"</span></h1>
            <p class="text-gray-500 mt-2">Menampilkan hasil pencarian dari berbagai kategori informasi.</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- News Results -->
            <div class="lg:col-span-2 space-y-8">
                <section data-aos="fade-up">
                    <h2 class="flex items-center text-xl font-bold text-gray-900 mb-6">
                        <i data-lucide="newspaper" class="w-6 h-6 mr-2 text-brand-green"></i>
                        Berita & Pengumuman
                        <span class="ml-3 px-2 py-0.5 bg-gray-100 text-gray-500 text-xs rounded-full">{{ $news->count() }}</span>
                    </h2>
                    
                    @forelse($news as $item)
                    <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 mb-4 hover:shadow-md transition">
                        <div class="flex flex-col md:flex-row gap-6">
                            @if($item->image_path)
                            <div class="w-full md:w-48 h-32 flex-shrink-0">
                                <img src="{{ $item->image_path }}" class="w-full h-full object-cover rounded-xl" alt="{{ $item->title }}">
                            </div>
                            @endif
                            <div>
                                <h3 class="text-lg font-bold text-gray-900 mb-2 hover:text-brand-green">
                                    <a href="{{ route('news.show', $item->slug) }}">{{ $item->title }}</a>
                                </h3>
                                <p class="text-gray-500 text-sm line-clamp-2 mb-4">{{ strip_tags($item->content) }}</p>
                                <div class="text-xs text-gray-400 flex items-center gap-3">
                                    <span class="flex items-center"><i data-lucide="calendar" class="w-3 h-3 mr-1"></i> {{ $item->created_at->format('d M Y') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="bg-white p-8 rounded-2xl text-center border border-dashed border-gray-200">
                        <p class="text-gray-500">Tidak ada berita yang sesuai dengan kata kunci tersebut.</p>
                    </div>
                    @endforelse
                </section>

                <section data-aos="fade-up" data-aos-delay="100">
                    <h2 class="flex items-center text-xl font-bold text-gray-900 mb-6">
                        <i data-lucide="file-text" class="w-6 h-6 mr-2 text-brand-green"></i>
                        Dokumen & Informasi Publik
                        <span class="ml-3 px-2 py-0.5 bg-gray-100 text-gray-500 text-xs rounded-full">{{ $docs->count() }}</span>
                    </h2>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        @forelse($docs as $doc)
                        <div class="bg-white p-5 rounded-2xl shadow-sm border border-gray-100 hover:border-brand-green transition group">
                            <div class="flex items-start gap-4">
                                <div class="w-10 h-10 bg-green-50 text-brand-green rounded-xl flex items-center justify-center flex-shrink-0 group-hover:bg-brand-green group-hover:text-white transition">
                                    <i data-lucide="file" class="w-5 h-5"></i>
                                </div>
                                <div>
                                    <h3 class="text-sm font-bold text-gray-900 mb-1 leading-tight">{{ $doc->title }}</h3>
                                    <p class="text-xs text-gray-400 uppercase tracking-tighter">{{ $doc->type ?? 'Dokumen' }}</p>
                                    <a href="{{ asset('storage/' . $doc->file_path) }}" target="_blank" class="inline-block mt-3 text-xs font-bold text-brand-green hover:underline">Download File</a>
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="col-span-full bg-white p-8 rounded-2xl text-center border border-dashed border-gray-200">
                            <p class="text-gray-500">Tidak ada dokumen yang sesuai.</p>
                        </div>
                        @endforelse
                    </div>
                </section>
            </div>

            <!-- FAQ Sidebar Results -->
            <div class="space-y-8">
                <section data-aos="fade-left">
                    <h2 class="flex items-center text-xl font-bold text-gray-900 mb-6">
                        <i data-lucide="help-circle" class="w-6 h-6 mr-2 text-brand-green"></i>
                        Tanya Jawab (FAQ)
                        <span class="ml-3 px-2 py-0.5 bg-gray-100 text-gray-500 text-xs rounded-full">{{ $faqs->count() }}</span>
                    </h2>

                    @forelse($faqs as $faq)
                    <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 mb-4">
                        <h3 class="text-sm font-bold text-gray-900 mb-2">Q: {{ $faq->question }}</h3>
                        <p class="text-xs text-gray-600">A: {{ $faq->answer }}</p>
                    </div>
                    @empty
                    <div class="bg-white p-8 rounded-2xl text-center border border-dashed border-gray-200">
                        <p class="text-gray-500">Tidak ada FAQ yang sesuai.</p>
                    </div>
                    @endforelse
                </section>

                <!-- Search Tips Card -->
                <div class="bg-brand-dark text-white p-8 rounded-[2.5rem] shadow-xl" data-aos="fade-left" data-aos-delay="100">
                    <h3 class="text-lg font-bold mb-4">Tips Pencarian</h3>
                    <ul class="text-sm space-y-3 text-gray-300">
                        <li class="flex items-start gap-2"><i data-lucide="check" class="w-4 h-4 text-brand-green mt-1 flex-shrink-0"></i> Gunakan kata kunci yang spesifik.</li>
                        <li class="flex items-start gap-2"><i data-lucide="check" class="w-4 h-4 text-brand-green mt-1 flex-shrink-0"></i> Pastikan ejaan kata sudah benar.</li>
                        <li class="flex items-start gap-2"><i data-lucide="check" class="w-4 h-4 text-brand-green mt-1 flex-shrink-0"></i> Jika belum menemukan, hubungi kami via WhatsApp.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
