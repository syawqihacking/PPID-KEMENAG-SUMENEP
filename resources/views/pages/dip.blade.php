@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<div class="relative bg-gray-900 overflow-hidden">
    <div class="absolute inset-0">
        <img src="https://images.unsplash.com/photo-1450101499163-c8848c66ca85?auto=format&fit=crop&q=80" alt="DIP" class="w-full h-full object-cover opacity-40">
        <div class="absolute inset-0 bg-gradient-to-r from-gray-900/80 to-transparent"></div>
    </div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 lg:py-28">
        <div class="max-w-2xl" data-aos="fade-up">
            <span class="inline-block px-3 py-1 bg-brand-green text-white text-xs font-semibold rounded-full uppercase tracking-wider mb-4">Informasi Publik</span>
            <h1 class="text-4xl md:text-5xl font-bold text-white leading-tight mb-6">Daftar Informasi Publik (DIP)</h1>
            <p class="text-lg text-gray-200 mb-4 max-w-xl">Daftar ringkasan informasi yang berada di bawah penguasaan PPID Kemenag Sumenep sesuai UU No. 14 Tahun 2008.</p>
        </div>
    </div>
</div>

<div class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="grid grid-cols-1 gap-12">
            @foreach(['Berkala', 'Serta Merta', 'Setiap Saat', 'Dikecualikan'] as $type)
            <div data-aos="fade-up">
                <div class="flex items-center gap-3 mb-6 border-b border-gray-100 pb-4">
                    <div class="w-10 h-10 bg-green-50 rounded-lg flex items-center justify-center text-brand-green">
                        <i data-lucide="folder" class="w-5 h-5"></i>
                    </div>
                    <h2 class="text-2xl font-bold text-gray-900">Informasi {{ $type }}</h2>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-gray-50 text-xs font-semibold text-gray-500 uppercase tracking-wider">
                                <th class="px-6 py-4 border-b border-gray-200 w-16">No</th>
                                <th class="px-6 py-4 border-b border-gray-200">Judul Informasi</th>
                                <th class="px-6 py-4 border-b border-gray-200">Ringkasan Isi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @forelse($dips->get($type, []) as $index => $dip)
                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-6 py-4 text-sm text-gray-600">{{ $index + 1 }}</td>
                                <td class="px-6 py-4">
                                    <span class="text-sm font-semibold text-gray-900">{{ $dip->title }}</span>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-600">{{ $dip->description }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="3" class="px-6 py-8 text-center text-gray-500 text-sm italic border-b border-gray-100">Belum ada informasi kategori ini.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            @endforeach
        </div>

    </div>
</div>
@endsection
