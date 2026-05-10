@extends('layouts.admin')

@section('title', 'Tambah DIP')

@section('content')
<div class="mb-6">
    <a href="{{ route('admin.dip.index') }}" class="text-brand-green hover:text-green-700 flex items-center gap-1 text-sm font-medium">
        <i data-lucide="arrow-left" class="w-4 h-4"></i> Kembali
    </a>
</div>

<div class="max-w-2xl">
    <h1 class="text-2xl font-bold text-gray-900 mb-6">Tambah Data Informasi Publik</h1>

    <div class="bg-white border border-gray-200 rounded-xl p-6 shadow-sm">
        <form action="{{ route('admin.dip.store') }}" method="POST">
            @csrf
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Judul Informasi</label>
                    <input type="text" name="title" required class="w-full border border-gray-300 rounded-lg px-4 py-2 text-sm focus:ring-brand-green focus:border-brand-green">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Kategori Tipe</label>
                    <select name="type" required class="w-full border border-gray-300 rounded-lg px-4 py-2 text-sm focus:ring-brand-green focus:border-brand-green">
                        <option value="Berkala">Berkala</option>
                        <option value="Serta Merta">Serta Merta</option>
                        <option value="Setiap Saat">Setiap Saat</option>
                        <option value="Dikecualikan">Dikecualikan</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Ringkasan Deskripsi</label>
                    <textarea name="description" rows="3" class="w-full border border-gray-300 rounded-lg px-4 py-2 text-sm focus:ring-brand-green focus:border-brand-green"></textarea>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Urutan</label>
                    <input type="number" name="order" value="0" class="w-full border border-gray-300 rounded-lg px-4 py-2 text-sm focus:ring-brand-green focus:border-brand-green">
                </div>
                <div class="pt-4">
                    <button type="submit" class="bg-brand-green hover:bg-green-700 text-white font-medium py-2.5 px-6 rounded-lg text-sm transition shadow-sm">Simpan Data</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
