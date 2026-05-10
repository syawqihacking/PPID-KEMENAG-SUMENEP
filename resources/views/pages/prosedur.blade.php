@extends('layouts.app')

@section('content')
<!-- Hero Section - matching home style -->
<div class="relative bg-gray-900 overflow-hidden">
    <div class="absolute inset-0">
        <img src="https://images.unsplash.com/photo-1450101499163-c8848c66ca85?auto=format&fit=crop&q=80" alt="Service Desk" class="w-full h-full object-cover opacity-40">
        <div class="absolute inset-0 bg-gradient-to-r from-gray-900/80 to-transparent"></div>
    </div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 lg:py-28">
        <div class="max-w-2xl" data-aos="fade-up">
            <span class="inline-block px-3 py-1 bg-brand-green text-white text-xs font-semibold rounded-full uppercase tracking-wider mb-4">Panduan Publik</span>
            <h1 class="text-4xl md:text-5xl font-bold text-white leading-tight mb-6">
                Standar & Prosedur<br>Layanan
            </h1>
            <p class="text-lg text-gray-200 mb-4 max-w-xl">
                Panduan lengkap mengenai tata cara permohonan informasi publik dan pengajuan keberatan di lingkungan Kemenag Sumenep.
            </p>
        </div>
    </div>
</div>

<!-- Maklumat Pelayanan -->
<div class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-3xl mx-auto text-center" data-aos="fade-up">
            <div class="w-16 h-16 bg-yellow-50 rounded-full flex items-center justify-center mx-auto mb-6 text-brand-gold">
                <i data-lucide="shield-check" class="w-8 h-8"></i>
            </div>
            <h2 class="text-3xl font-bold text-gray-900 mb-6">Maklumat Pelayanan</h2>
            <blockquote class="text-xl text-gray-700 italic font-medium leading-relaxed border-l-4 border-brand-gold pl-6 text-left">
                "{!! nl2br(e($settings['prosedur_maklumat'] ?? 'Kami berkomitmen memberikan pelayanan informasi publik yang cepat, tepat, akurat, dan transparan sesuai dengan Undang-Undang Keterbukaan Informasi Publik.')) !!}"
            </blockquote>
        </div>
    </div>
</div>

<!-- Prosedur Permohonan -->
<div class="py-16 bg-gray-50 border-t border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12" data-aos="fade-up">
            <h2 class="text-3xl font-bold text-gray-900 mb-2">Prosedur Permohonan Informasi</h2>
            <p class="text-gray-600">Langkah-langkah pengajuan permohonan informasi publik.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <!-- Step 1 -->
            <div class="bg-white border border-gray-200 rounded-xl p-6 hover:shadow-lg transition duration-300 transform hover:-translate-y-1 relative" data-aos="fade-up" data-aos-delay="100">
                <div class="w-10 h-10 bg-brand-green text-white rounded-full flex items-center justify-center font-bold text-lg mb-5">1</div>
                <div class="w-12 h-12 bg-green-50 rounded-lg flex items-center justify-center mb-4 text-brand-green">
                    <i data-lucide="edit" class="w-6 h-6"></i>
                </div>
                <h4 class="text-lg font-semibold text-gray-900 mb-2">Mengisi Formulir</h4>
                <p class="text-sm text-gray-600">Pemohon mengisi formulir permohonan secara online atau datang langsung ke meja layanan PPID dengan membawa KTP.</p>
            </div>

            <!-- Step 2 -->
            <div class="bg-white border border-gray-200 rounded-xl p-6 hover:shadow-lg transition duration-300 transform hover:-translate-y-1 relative" data-aos="fade-up" data-aos-delay="200">
                <div class="w-10 h-10 bg-brand-green text-white rounded-full flex items-center justify-center font-bold text-lg mb-5">2</div>
                <div class="w-12 h-12 bg-yellow-50 rounded-lg flex items-center justify-center mb-4 text-yellow-600">
                    <i data-lucide="check-circle" class="w-6 h-6"></i>
                </div>
                <h4 class="text-lg font-semibold text-gray-900 mb-2">Pencatatan & Verifikasi</h4>
                <p class="text-sm text-gray-600">Petugas PPID mencatat di buku register dan memverifikasi kelengkapan persyaratan pemohon.</p>
            </div>

            <!-- Step 3 -->
            <div class="bg-white border border-gray-200 rounded-xl p-6 hover:shadow-lg transition duration-300 transform hover:-translate-y-1 relative" data-aos="fade-up" data-aos-delay="300">
                <div class="w-10 h-10 bg-brand-green text-white rounded-full flex items-center justify-center font-bold text-lg mb-5">3</div>
                <div class="w-12 h-12 bg-blue-50 rounded-lg flex items-center justify-center mb-4 text-blue-600">
                    <i data-lucide="clock" class="w-6 h-6"></i>
                </div>
                <h4 class="text-lg font-semibold text-gray-900 mb-2">Proses Pemenuhan</h4>
                <p class="text-sm text-gray-600">Waktu penyelesaian maksimal <strong>10 hari kerja</strong>, dan dapat diperpanjang 7 hari kerja bila diperlukan.</p>
            </div>

            <!-- Step 4 -->
            <div class="bg-white border border-gray-200 rounded-xl p-6 hover:shadow-lg transition duration-300 transform hover:-translate-y-1 relative" data-aos="fade-up" data-aos-delay="400">
                <div class="w-10 h-10 bg-brand-green text-white rounded-full flex items-center justify-center font-bold text-lg mb-5">4</div>
                <div class="w-12 h-12 bg-gray-100 rounded-lg flex items-center justify-center mb-4 text-gray-600">
                    <i data-lucide="file-check" class="w-6 h-6"></i>
                </div>
                <h4 class="text-lg font-semibold text-gray-900 mb-2">Penyerahan Informasi</h4>
                <p class="text-sm text-gray-600">Informasi diserahkan via email atau hardcopy beserta Tanda Bukti Penyerahan Informasi.</p>
            </div>
        </div>
    </div>
</div>

<!-- Klasifikasi Informasi -->
<div class="py-16 bg-white border-t border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-end mb-8 border-b border-gray-200 pb-4" data-aos="fade-up">
            <div>
                <h2 class="text-2xl font-bold text-gray-900 mb-1">Klasifikasi Informasi</h2>
                <p class="text-sm text-gray-600">Jenis-jenis informasi publik sesuai UU KIP.</p>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="bg-white border border-gray-200 rounded-xl p-6 hover:shadow-lg transition duration-300 transform hover:-translate-y-1" data-aos="fade-up" data-aos-delay="100">
                <div class="w-12 h-12 bg-green-50 rounded-lg flex items-center justify-center mb-4 text-brand-green">
                    <i data-lucide="calendar-check" class="w-6 h-6"></i>
                </div>
                <h4 class="font-semibold text-gray-900 mb-2">Informasi Berkala</h4>
                <p class="text-sm text-gray-600">Informasi yang wajib disediakan dan diumumkan secara rutin — laporan tahunan, laporan keuangan, dan profil organisasi.</p>
            </div>
            <div class="bg-white border border-gray-200 rounded-xl p-6 hover:shadow-lg transition duration-300 transform hover:-translate-y-1" data-aos="fade-up" data-aos-delay="200">
                <div class="w-12 h-12 bg-red-50 rounded-lg flex items-center justify-center mb-4 text-red-500">
                    <i data-lucide="alert-triangle" class="w-6 h-6"></i>
                </div>
                <h4 class="font-semibold text-gray-900 mb-2">Informasi Serta Merta</h4>
                <p class="text-sm text-gray-600">Informasi yang wajib diumumkan segera karena menyangkut kepentingan publik — pengumuman darurat dan peringatan dini.</p>
            </div>
            <div class="bg-white border border-gray-200 rounded-xl p-6 hover:shadow-lg transition duration-300 transform hover:-translate-y-1" data-aos="fade-up" data-aos-delay="300">
                <div class="w-12 h-12 bg-yellow-50 rounded-lg flex items-center justify-center mb-4 text-yellow-600">
                    <i data-lucide="folder-open" class="w-6 h-6"></i>
                </div>
                <h4 class="font-semibold text-gray-900 mb-2">Informasi Setiap Saat</h4>
                <p class="text-sm text-gray-600">Informasi yang tersedia setiap saat dan dapat diakses publik — RENSTRA, DIPA, dan standar operasional prosedur.</p>
            </div>
            <div class="bg-white border border-gray-200 rounded-xl p-6 hover:shadow-lg transition duration-300 transform hover:-translate-y-1" data-aos="fade-up" data-aos-delay="400">
                <div class="w-12 h-12 bg-gray-100 rounded-lg flex items-center justify-center mb-4 text-gray-500">
                    <i data-lucide="lock" class="w-6 h-6"></i>
                </div>
                <h4 class="font-semibold text-gray-900 mb-2">Informasi Dikecualikan</h4>
                <p class="text-sm text-gray-600">Informasi yang tidak dapat diberikan karena menyangkut privasi, rahasia negara, atau proses penegakan hukum.</p>
            </div>
        </div>
    </div>
</div>

<!-- CTA -->
<div class="py-16 bg-gray-50 border-t border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-brand-dark rounded-xl p-8 md:p-12 flex flex-col md:flex-row items-center justify-between gap-6" data-aos="fade-up">
            <div>
                <h3 class="text-2xl font-bold text-white mb-2">Sudah memahami prosedurnya?</h3>
                <p class="text-green-100">Ajukan permohonan informasi publik secara online, kapan saja dan dari mana saja.</p>
            </div>
            <a href="{{ route('requests.create') }}" class="bg-brand-gold hover:bg-yellow-600 text-white font-semibold py-3 px-8 rounded-full shadow-lg hover:shadow-xl transition duration-300 transform hover:-translate-y-1 shrink-0 text-center">
                Ajukan Permohonan →
            </a>
        </div>
    </div>
</div>
@endsection
