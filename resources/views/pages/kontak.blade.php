@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<div class="relative bg-gray-900 overflow-hidden">
    <div class="absolute inset-0">
        <img src="https://images.unsplash.com/photo-1423666639041-f56000c27a9a?auto=format&fit=crop&q=80" alt="Contact" class="w-full h-full object-cover opacity-40">
        <div class="absolute inset-0 bg-gradient-to-r from-gray-900/80 to-transparent"></div>
    </div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 lg:py-28">
        <div class="max-w-2xl" data-aos="fade-up">
            <span class="inline-block px-3 py-1 bg-brand-green text-white text-xs font-semibold rounded-full uppercase tracking-wider mb-4">Hubungi Kami</span>
            <h1 class="text-4xl md:text-5xl font-bold text-white leading-tight mb-6">Kontak PPID</h1>
            <p class="text-lg text-gray-200 mb-4 max-w-xl">Hubungi kami untuk pertanyaan, saran, atau informasi lebih lanjut mengenai layanan PPID Kemenag Sumenep.</p>
        </div>
    </div>
</div>

<!-- Contact Info -->
<div class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-16">
            <div class="bg-white border border-gray-200 rounded-xl p-6 hover:shadow-lg transition duration-300 transform hover:-translate-y-1 text-center" data-aos="fade-up" data-aos-delay="100">
                <div class="w-12 h-12 bg-green-50 rounded-lg flex items-center justify-center mx-auto mb-4 text-brand-green">
                    <i data-lucide="map-pin" class="w-6 h-6"></i>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-2">Alamat Kantor</h3>
                <p class="text-sm text-gray-600">{{ $settings['kontak_alamat'] ?? 'Jl. KH. Mansyur No. 2, Kolor, Kec. Kota Sumenep, Kabupaten Sumenep, Jawa Timur 69417' }}</p>
            </div>
            <div class="bg-white border border-gray-200 rounded-xl p-6 hover:shadow-lg transition duration-300 transform hover:-translate-y-1 text-center" data-aos="fade-up" data-aos-delay="200">
                <div class="w-12 h-12 bg-yellow-50 rounded-lg flex items-center justify-center mx-auto mb-4 text-yellow-600">
                    <i data-lucide="phone" class="w-6 h-6"></i>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-2">Telepon & Fax</h3>
                <p class="text-sm text-gray-600">{{ $settings['kontak_telepon'] ?? '(0328) 662-124' }}</p>
            </div>
            <div class="bg-white border border-gray-200 rounded-xl p-6 hover:shadow-lg transition duration-300 transform hover:-translate-y-1 text-center" data-aos="fade-up" data-aos-delay="300">
                <div class="w-12 h-12 bg-blue-50 rounded-lg flex items-center justify-center mx-auto mb-4 text-blue-600">
                    <i data-lucide="mail" class="w-6 h-6"></i>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-2">Email Resmi</h3>
                <p class="text-sm text-gray-600">{!! nl2br(e(str_replace(', ', "\n", $settings['kontak_email'] ?? "ppid.sumenep@kemenag.go.id\nkankemenag.sumenep@kemenag.go.id"))) !!}</p>
            </div>
        </div>

        <!-- Jam Operasional -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div data-aos="fade-up">
                <div class="flex justify-between items-end mb-6 border-b border-gray-200 pb-4">
                    <div>
                        <h2 class="text-2xl font-bold text-gray-900 mb-1">Jam Operasional</h2>
                        <p class="text-sm text-gray-600">Waktu pelayanan informasi publik.</p>
                    </div>
                </div>
                <div class="space-y-4">
                    <div class="flex justify-between items-center bg-white border border-gray-200 rounded-xl p-4">
                        <div class="flex items-center gap-3"><i data-lucide="calendar" class="w-5 h-5 text-brand-green"></i><span class="font-medium text-gray-900">Jadwal Pelayanan</span></div>
                        <span class="text-sm text-gray-600 font-medium text-right">{!! nl2br(e($settings['kontak_jam_kerja'] ?? "Senin - Kamis (08:00 - 16:00 WIB)\nJumat (08:00 - 16:30 WIB)")) !!}</span>
                    </div>
                </div>
            </div>

            <div data-aos="fade-up" data-aos-delay="100">
                <div class="flex justify-between items-end mb-6 border-b border-gray-200 pb-4">
                    <div>
                        <h2 class="text-2xl font-bold text-gray-900 mb-1">Lokasi Kami</h2>
                        <p class="text-sm text-gray-600">Kantor Kementerian Agama Kab. Sumenep.</p>
                    </div>
                </div>
                <div class="bg-gray-200 rounded-xl overflow-hidden border border-gray-200" style="height: 260px;">
                    <iframe src="{{ $settings['kontak_maps_embed'] ?? 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3956.5!2d113.87!3d-7.0!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNMKwMDAnMDAuMCJTIDExM8KwNTInMDAuMCJF!5e0!3m2!1sen!2sid!4v1234567890' }}" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
