@extends('layouts.admin')

@section('title', 'Edit News')

@section('content')
<div class="bg-white rounded-xl shadow-sm border border-gray-200 max-w-3xl">
    <div class="p-6 border-b border-gray-200 flex justify-between items-center">
        <h3 class="text-xl font-bold text-brand-dark">Edit Post: {{ Str::limit($news->title, 40) }}</h3>
    </div>

    <form action="{{ route('admin.news.update', $news->id) }}" method="POST" enctype="multipart/form-data" class="p-6">
        @csrf
        @method('PUT')
        
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700 mb-2">Title</label>
            <input type="text" name="title" value="{{ old('title', $news->title) }}" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-brand-green focus:border-brand-green" required>
            @error('title')<span class="text-red-500 text-xs mt-1">{{ $message }}</span>@enderror
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700 mb-2">Category</label>
            <input type="text" name="category" value="{{ old('category', $news->category) }}" placeholder="e.g. Pengumuman, Haji, Pendidikan" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-brand-green focus:border-brand-green">
            @error('category')<span class="text-red-500 text-xs mt-1">{{ $message }}</span>@enderror
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700 mb-2">Content</label>
            <textarea name="content" rows="10" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-brand-green focus:border-brand-green" required>{{ old('content', $news->content) }}</textarea>
            @error('content')<span class="text-red-500 text-xs mt-1">{{ $message }}</span>@enderror
        </div>

        <div class="mb-6">
            <label class="block text-sm font-medium text-gray-700 mb-2">Feature Image (Optional)</label>
            @if($news->image_path)
            <div class="mb-3">
                <img src="{{ $news->image_path }}" class="h-32 rounded object-cover">
            </div>
            @endif
            <input type="file" name="image" accept="image/*" class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-green-50 file:text-brand-green hover:file:bg-green-100">
            <p class="text-xs text-gray-400 mt-1">Leave empty to keep current image</p>
            @error('image')<span class="text-red-500 text-xs mt-1">{{ $message }}</span>@enderror
        </div>

        <div class="flex gap-4">
            <button type="submit" class="bg-brand-dark hover:bg-green-900 text-white font-medium py-2 px-6 rounded-md shadow-sm transition">Update News</button>
            <a href="{{ route('admin.news.index') }}" class="bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium py-2 px-6 rounded-md transition">Cancel</a>
        </div>
    </form>
</div>
@endsection
