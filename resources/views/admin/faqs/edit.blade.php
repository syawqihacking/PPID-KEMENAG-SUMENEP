@extends('layouts.admin')

@section('title', 'Edit FAQ')

@section('content')
<div class="mb-6">
    <a href="{{ route('admin.faqs.index') }}" class="text-brand-green hover:text-green-700 flex items-center gap-1 text-sm font-medium">
        <i data-lucide="arrow-left" class="w-4 h-4"></i> Kembali ke Daftar
    </a>
</div>

<div class="max-w-2xl">
    <h1 class="text-2xl font-bold text-gray-900 mb-6">Edit Pertanyaan</h1>

    <div class="bg-white border border-gray-200 rounded-xl p-6 shadow-sm">
        <form action="{{ route('admin.faqs.update', $faq) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Pertanyaan</label>
                    <input type="text" name="question" value="{{ $faq->question }}" required class="w-full border border-gray-300 rounded-lg px-4 py-2 text-sm focus:ring-brand-green focus:border-brand-green">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Jawaban</label>
                    <textarea name="answer" rows="5" required class="w-full border border-gray-300 rounded-lg px-4 py-2 text-sm focus:ring-brand-green focus:border-brand-green">{{ $faq->answer }}</textarea>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Urutan Tampil</label>
                        <input type="number" name="order" value="{{ $faq->order }}" class="w-full border border-gray-300 rounded-lg px-4 py-2 text-sm focus:ring-brand-green focus:border-brand-green">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                        <select name="is_active" class="w-full border border-gray-300 rounded-lg px-4 py-2 text-sm focus:ring-brand-green focus:border-brand-green">
                            <option value="1" {{ $faq->is_active ? 'selected' : '' }}>Aktif (Tampil)</option>
                            <option value="0" {{ !$faq->is_active ? 'selected' : '' }}>Draft (Sembunyikan)</option>
                        </select>
                    </div>
                </div>
                <div class="pt-4">
                    <button type="submit" class="bg-brand-green hover:bg-green-700 text-white font-medium py-2.5 px-6 rounded-lg text-sm transition shadow-sm">Perbarui FAQ</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
