@extends('layouts.app')

@section('content')
<div class="bg-gray-50 py-12">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="mb-8 text-center" data-aos="fade-up">
            <h1 class="text-3xl md:text-4xl font-bold text-brand-dark mb-4">Formulir Permohonan Informasi Publik</h1>
            <p class="text-gray-600">Isi formulir di bawah ini untuk mengajukan permohonan informasi kepada PPID Kemenag Sumenep.</p>
        </div>

        <div class="bg-white p-8 rounded-xl border border-gray-200 shadow-sm" data-aos="fade-up" data-aos-delay="100">
            @if(session('success'))
            <div class="bg-green-100 border-l-4 border-brand-green text-green-700 p-4 mb-6 rounded">
                {{ session('success') }}
            </div>
            @endif

            <form action="{{ route('requests.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Nama Lengkap</label>
                    <input type="text" name="name" 
                        value="{{ auth()->check() ? auth()->user()->name : '' }}" 
                        {{ auth()->check() ? 'readonly' : '' }}
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-brand-green focus:border-brand-green {{ auth()->check() ? 'bg-gray-100 cursor-not-allowed' : '' }}" required>
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Alamat Email</label>
                    <input type="email" name="email" 
                        value="{{ auth()->check() ? auth()->user()->email : '' }}" 
                        {{ auth()->check() ? 'readonly' : '' }}
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-brand-green focus:border-brand-green {{ auth()->check() ? 'bg-gray-100 cursor-not-allowed' : '' }}" required>
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Subjek Permohonan</label>
                    <input type="text" name="subject" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-brand-green focus:border-brand-green" required>
                </div>

                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Rincian Informasi yang Dibutuhkan</label>
                    <textarea name="message" rows="5" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-brand-green focus:border-brand-green" required></textarea>
                </div>

                <div class="flex justify-end">
                    <button type="submit" class="bg-brand-dark hover:bg-green-900 text-white font-medium py-2.5 px-6 rounded-md shadow-sm transition">
                        Kirim Permohonan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
