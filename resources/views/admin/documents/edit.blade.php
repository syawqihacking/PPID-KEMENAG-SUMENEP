@extends('layouts.admin')

@section('title', 'Edit Document')

@section('content')
<div class="bg-white rounded-xl shadow-sm border border-gray-200 max-w-2xl">
    <div class="p-6 border-b border-gray-200">
        <h3 class="text-xl font-bold text-brand-dark">Edit Document: {{ Str::limit($document->title, 40) }}</h3>
    </div>

    <form action="{{ route('admin.documents.update', $document->id) }}" method="POST" enctype="multipart/form-data" class="p-6">
        @csrf
        @method('PUT')
        
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700 mb-2">Document Title</label>
            <input type="text" name="title" value="{{ old('title', $document->title) }}" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-brand-green focus:border-brand-green" required>
            @error('title')<span class="text-red-500 text-xs mt-1">{{ $message }}</span>@enderror
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700 mb-2">Category</label>
            <select name="category" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-brand-green focus:border-brand-green" required>
                <option value="">Select Category...</option>
                <option value="Keuangan" {{ old('category', $document->category) == 'Keuangan' ? 'selected' : '' }}>Keuangan</option>
                <option value="Kepegawaian" {{ old('category', $document->category) == 'Kepegawaian' ? 'selected' : '' }}>Kepegawaian</option>
                <option value="Program" {{ old('category', $document->category) == 'Program' ? 'selected' : '' }}>Program</option>
                <option value="Umum" {{ old('category', $document->category) == 'Umum' ? 'selected' : '' }}>Umum</option>
            </select>
            @error('category')<span class="text-red-500 text-xs mt-1">{{ $message }}</span>@enderror
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700 mb-2">Description</label>
            <textarea name="description" rows="4" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-brand-green focus:border-brand-green" required>{{ old('description', $document->description) }}</textarea>
            @error('description')<span class="text-red-500 text-xs mt-1">{{ $message }}</span>@enderror
        </div>

        <div class="mb-6">
            <label class="block text-sm font-medium text-gray-700 mb-2">File</label>
            <div class="mb-2 text-sm text-gray-500">Current file: <a href="{{ $document->file_path }}" target="_blank" class="text-brand-green underline">View File</a> ({{ $document->file_extension }} &bull; {{ $document->file_size }})</div>
            <input type="file" name="file" accept=".pdf,.doc,.docx,.xls,.xlsx" class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-green-50 file:text-brand-green hover:file:bg-green-100">
            <p class="text-xs text-gray-400 mt-1">Leave empty to keep current file. Allowed formats: PDF, DOC, DOCX, XLS, XLSX. Max size: 10MB.</p>
            @error('file')<span class="text-red-500 text-xs mt-1">{{ $message }}</span>@enderror
        </div>

        <div class="flex gap-4">
            <button type="submit" class="bg-brand-dark hover:bg-green-900 text-white font-medium py-2 px-6 rounded-md shadow-sm transition">Update Document</button>
            <a href="{{ route('admin.documents.index') }}" class="bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium py-2 px-6 rounded-md transition">Cancel</a>
        </div>
    </form>
</div>
@endsection
