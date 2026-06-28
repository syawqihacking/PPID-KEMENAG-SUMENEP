@extends('layouts.admin')

@section('title', isset($chatbotKnowledge) ? 'Edit Pengetahuan' : 'Tambah Pengetahuan')

@section('content')
<div class="mb-6">
    <a href="{{ route('admin.chatbot_knowledge.index') }}" class="text-sm font-medium text-gray-500 hover:text-gray-900 flex items-center gap-1">
        <i data-lucide="arrow-left" class="w-4 h-4"></i> Kembali
    </a>
</div>

<div class="bg-white border border-gray-200 rounded-xl overflow-hidden shadow-sm max-w-3xl">
    <div class="px-6 py-4 border-b border-gray-200 bg-gray-50">
        <h2 class="text-lg font-bold text-gray-900">{{ isset($chatbotKnowledge) ? 'Edit Materi Pengetahuan AI' : 'Tambah Materi Pengetahuan AI' }}</h2>
    </div>

    <form action="{{ isset($chatbotKnowledge) ? route('admin.chatbot_knowledge.update', $chatbotKnowledge) : route('admin.chatbot_knowledge.store') }}" method="POST" class="p-6">
        @csrf
        @if(isset($chatbotKnowledge))
            @method('PUT')
        @endif

        <div class="space-y-6">
            <div>
                <label for="title" class="block text-sm font-semibold text-gray-700 mb-1">Judul / Topik Pengetahuan <span class="text-red-500">*</span></label>
                <input type="text" name="title" id="title" value="{{ old('title', $chatbotKnowledge->title ?? '') }}" class="w-full px-4 py-2 bg-gray-50 border border-gray-300 focus:border-brand-green focus:bg-white rounded-lg outline-none transition" placeholder="Contoh: Prosedur Pengajuan Keberatan" required>
                @error('title')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="content" class="block text-sm font-semibold text-gray-700 mb-1">Isi Materi / Pengetahuan <span class="text-red-500">*</span></label>
                <p class="text-xs text-gray-500 mb-2">Tuliskan informasi atau pedoman yang akan diajarkan ke AI. AI akan membaca teks ini sebagai referensi ketika ditanya pengguna.</p>
                <textarea name="content" id="content" rows="6" class="w-full px-4 py-3 bg-gray-50 border border-gray-300 focus:border-brand-green focus:bg-white rounded-lg outline-none transition resize-none" placeholder="Masukkan materi pengetahuan untuk AI secara lengkap..." required>{{ old('content', $chatbotKnowledge->content ?? '') }}</textarea>
                @error('content')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center gap-2">
                <input type="checkbox" name="is_active" id="is_active" value="1" {{ old('is_active', isset($chatbotKnowledge) ? $chatbotKnowledge->is_active : true) ? 'checked' : '' }} class="w-4 h-4 text-brand-green border-gray-300 rounded focus:ring-brand-green">
                <label for="is_active" class="text-sm text-gray-700 font-medium">Aktifkan pengetahuan ini (AI akan membacanya)</label>
            </div>
        </div>

        <div class="mt-8 pt-5 border-t border-gray-200 flex justify-end gap-3">
            <a href="{{ route('admin.chatbot_knowledge.index') }}" class="px-5 py-2.5 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition">
                Batal
            </a>
            <button type="submit" class="px-5 py-2.5 text-sm font-medium text-white bg-brand-green rounded-lg hover:bg-green-700 transition shadow-sm flex items-center gap-2">
                <i data-lucide="save" class="w-4 h-4"></i> Simpan Pengetahuan
            </button>
        </div>
    </form>
</div>
@endsection
