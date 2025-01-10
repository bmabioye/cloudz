@extends('layouts.admin')

@section('content')
<div class="container mx-auto py-6">
    <h1 class="text-2xl font-bold mb-4">Edit Resource</h1>

    <form action="{{ route('resources.update', $resource->id) }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 shadow-md rounded">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="title" class="block font-medium mb-2">Title</label>
            <input type="text" name="title" id="title" value="{{ old('title', $resource->title) }}" class="w-full border-gray-300 rounded-lg shadow-sm" required>
            @error('title') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div class="mb-4">
            <label for="description" class="block font-medium mb-2">Description</label>
            <textarea name="description" id="description" rows="5" class="w-full border-gray-300 rounded-lg shadow-sm" required>{{ old('description', $resource->description) }}</textarea>
            @error('description') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div class="mb-4">
            <label for="category_id" class="block font-medium mb-2">Category</label>
            <select name="category_id" id="category_id" class="w-full border-gray-300 rounded-lg shadow-sm" required>
                @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ old('category_id', $resource->category_id) == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
            </select>
            @error('category_id') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div class="mb-4">
            <label for="price" class="block font-medium mb-2">Price</label>
            <input type="number" name="price" id="price" value="{{ old('price', $resource->price) }}" step="0.01" class="w-full border-gray-300 rounded-lg shadow-sm" required>
            @error('price') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div class="mb-4">
            <label for="file" class="block font-medium mb-2">File</label>
            <input type="file" name="file" id="file" class="w-full border-gray-300 rounded-lg shadow-sm">
            @if($resource->file_path)
            <p class="text-sm text-gray-500 mt-1">Current file: <a href="{{ asset('storage/' . $resource->file_path) }}" target="_blank" class="text-blue-500 hover:underline">View File</a></p>
            @endif
            @error('file') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Update Resource</button>
            <a href="{{ route('admin.resources.index') }}" class="text-gray-500 hover:underline ml-4">Cancel</a>
        </div>
    </form>
</div>
@endsection
