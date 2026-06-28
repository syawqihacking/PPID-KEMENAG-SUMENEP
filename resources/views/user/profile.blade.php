@extends('layouts.user')
@section('title', 'Profil Saya')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-3 gap-6">
    <!-- Kolom Kiri: Info Profil -->
    <div class="md:col-span-1 space-y-6">
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden text-center p-6">
            <div class="w-24 h-24 mx-auto bg-brand-green rounded-full flex items-center justify-center text-white text-3xl font-bold mb-4 shadow-inner">
                {{ substr(auth()->user()->name, 0, 1) }}
            </div>
            <h3 class="text-lg font-bold text-gray-900">{{ auth()->user()->name }}</h3>
            <p class="text-sm text-gray-500 mb-4">{{ auth()->user()->email }}</p>
            <span class="inline-flex px-3 py-1 bg-blue-100 text-blue-700 rounded-full text-xs font-bold uppercase tracking-wider">Pemohon Publik</span>
        </div>
    </div>

    <!-- Kolom Kanan: Form Update -->
    <div class="md:col-span-2 space-y-6">
        <!-- Update Data Diri -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
            <div class="p-6 border-b border-gray-200 bg-gray-50/50">
                <h3 class="font-bold text-gray-900 flex items-center gap-2">
                    <i data-lucide="user" class="w-5 h-5 text-brand-green"></i> Informasi Pribadi
                </h3>
            </div>
            <div class="p-6">
                @if(session('success'))
                <div class="bg-green-50 text-green-700 p-4 rounded-lg mb-6 text-sm border border-green-100">
                    {{ session('success') }}
                </div>
                @endif

                <form action="{{ route('user.profile.update') }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="space-y-4 mb-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
                            <input type="text" name="name" value="{{ old('name', auth()->user()->name) }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-brand-green focus:border-brand-green transition" required>
                            @error('name') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Alamat Email</label>
                            <input type="email" name="email" value="{{ old('email', auth()->user()->email) }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-brand-green focus:border-brand-green transition" required>
                            @error('email') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <button type="submit" class="bg-brand-green text-white font-medium py-2 px-6 rounded-lg hover:bg-brand-dark transition shadow-sm">
                        Simpan Perubahan
                    </button>
                </form>
            </div>
        </div>

        <!-- Update Password -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
            <div class="p-6 border-b border-gray-200 bg-gray-50/50">
                <h3 class="font-bold text-gray-900 flex items-center gap-2">
                    <i data-lucide="lock" class="w-5 h-5 text-brand-green"></i> Ubah Kata Sandi
                </h3>
            </div>
            <div class="p-6">
                @if(session('success_password'))
                <div class="bg-green-50 text-green-700 p-4 rounded-lg mb-6 text-sm border border-green-100">
                    {{ session('success_password') }}
                </div>
                @endif

                <form action="{{ route('user.profile.password') }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="space-y-4 mb-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Kata Sandi Saat Ini</label>
                            <input type="password" name="current_password" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-brand-green focus:border-brand-green transition" required>
                            @error('current_password') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Kata Sandi Baru</label>
                            <input type="password" name="password" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-brand-green focus:border-brand-green transition" required placeholder="Minimal 8 karakter">
                            @error('password') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Konfirmasi Kata Sandi Baru</label>
                            <input type="password" name="password_confirmation" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-brand-green focus:border-brand-green transition" required>
                        </div>
                    </div>

                    <button type="submit" class="bg-gray-800 text-white font-medium py-2 px-6 rounded-lg hover:bg-gray-900 transition shadow-sm">
                        Perbarui Sandi
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
