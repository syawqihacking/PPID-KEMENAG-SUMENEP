@extends('layouts.admin')

@section('title', 'Add News')

@section('content')
<div class="bg-white rounded-xl shadow-sm border border-gray-200 max-w-3xl">
    <div class="p-6 border-b border-gray-200">
        <h3 class="text-xl font-bold text-brand-dark">Create New Post</h3>
    </div>

    <form action="{{ route('admin.news.store') }}" method="POST" enctype="multipart/form-data" class="p-6">
        @csrf
        
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700 mb-2">Title</label>
            <input type="text" name="title" value="{{ old('title') }}" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-brand-green focus:border-brand-green" required>
            @error('title')<span class="text-red-500 text-xs mt-1">{{ $message }}</span>@enderror
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700 mb-2">Category</label>
            <input type="text" name="category" value="{{ old('category') }}" placeholder="e.g. Pengumuman, Haji, Pendidikan" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-brand-green focus:border-brand-green">
            @error('category')<span class="text-red-500 text-xs mt-1">{{ $message }}</span>@enderror
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700 mb-2">Content</label>
            <textarea name="content" rows="10" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-brand-green focus:border-brand-green" required>{{ old('content') }}</textarea>
            @error('content')<span class="text-red-500 text-xs mt-1">{{ $message }}</span>@enderror
        </div>

        <div class="mb-6">
            <label class="block text-sm font-medium text-gray-700 mb-2">Feature Image (Optional)</label>
            <input type="file" name="image" accept="image/*" class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-green-50 file:text-brand-green hover:file:bg-green-100">
            @error('image')<span class="text-red-500 text-xs mt-1">{{ $message }}</span>@enderror
        </div>

        <div class="flex gap-4">
            <button type="submit" class="bg-brand-dark hover:bg-green-900 text-white font-medium py-2 px-6 rounded-md shadow-sm transition">Save News</button>
            <a href="{{ route('admin.news.index') }}" class="bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium py-2 px-6 rounded-md transition">Cancel</a>
        </div>
    </form>
</div>
@endsection
