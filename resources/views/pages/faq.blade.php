@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<div class="relative bg-gray-900 overflow-hidden">
    <div class="absolute inset-0">
        <img src="https://images.unsplash.com/photo-1434030216411-0b793f4b4173?auto=format&fit=crop&q=80" alt="FAQ" class="w-full h-full object-cover opacity-40">
        <div class="absolute inset-0 bg-gradient-to-r from-gray-900/80 to-transparent"></div>
    </div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 lg:py-28">
        <div class="max-w-2xl" data-aos="fade-up">
            <span class="inline-block px-3 py-1 bg-brand-green text-white text-xs font-semibold rounded-full uppercase tracking-wider mb-4">Bantuan</span>
            <h1 class="text-4xl md:text-5xl font-bold text-white leading-tight mb-6">Pertanyaan Umum</h1>
            <p class="text-lg text-gray-200 mb-4 max-w-xl">Temukan jawaban atas pertanyaan yang sering diajukan seputar layanan informasi publik PPID.</p>
        </div>
    </div>
</div>

<!-- FAQ Content -->
<div class="py-16 bg-white">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="space-y-4" id="faq-list">
            @forelse($faqs as $index => $faq)
            <!-- FAQ Item -->
            <div class="border border-gray-200 rounded-xl overflow-hidden" data-aos="fade-up" data-aos-delay="{{ 100 + ($index * 50) }}">
                <button onclick="toggleFaq(this)" class="w-full flex justify-between items-center p-6 text-left hover:bg-gray-50 transition">
                    <span class="font-semibold text-gray-900">{{ $faq->question }}</span>
                    <i data-lucide="chevron-down" class="w-5 h-5 text-gray-400 faq-icon transition-transform duration-300"></i>
                </button>
                <div class="faq-answer hidden px-6 pb-6">
                    <div class="text-gray-600 leading-relaxed prose max-w-none">
                        {!! nl2br(e($faq->answer)) !!}
                    </div>
                </div>
            </div>
            @empty
            <div class="text-center text-gray-500 py-8">Belum ada pertanyaan umum yang ditambahkan.</div>
            @endforelse
        </div>
    </div>
</div>

<!-- CTA -->
<div class="py-16 bg-gray-50 border-t border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-brand-dark rounded-xl p-8 md:p-12 flex flex-col md:flex-row items-center justify-between gap-6" data-aos="fade-up">
            <div>
                <h3 class="text-2xl font-bold text-white mb-2">Tidak menemukan jawaban?</h3>
                <p class="text-green-100">Hubungi kami langsung atau ajukan permohonan informasi secara resmi.</p>
            </div>
            <div class="flex gap-4 shrink-0">
                <a href="{{ route('kontak.index') }}" class="bg-white/10 hover:bg-white/20 text-white border border-white/30 font-semibold py-3 px-6 rounded-full transition text-center">Hubungi Kami</a>
                <a href="{{ route('requests.create') }}" class="bg-brand-gold hover:bg-yellow-600 text-white font-semibold py-3 px-6 rounded-full shadow-lg transition text-center">Ajukan Permohonan</a>
            </div>
        </div>
    </div>
</div>

<script>
function toggleFaq(btn) {
    const answer = btn.nextElementSibling;
    const icon = btn.querySelector('.faq-icon');
    const isOpen = !answer.classList.contains('hidden');

    // Close all others
    document.querySelectorAll('.faq-answer').forEach(a => a.classList.add('hidden'));
    document.querySelectorAll('.faq-icon').forEach(i => i.style.transform = 'rotate(0deg)');

    if (!isOpen) {
        answer.classList.remove('hidden');
        icon.style.transform = 'rotate(180deg)';
    }
}
</script>
@endsection
