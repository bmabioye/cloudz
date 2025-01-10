@extends('layouts.admin')

@section('content')
<div class="container mx-auto py-6">
    <h1 class="text-2xl font-bold mb-4">Add New Resource</h1>

    <form action="{{ route('resources.store') }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 shadow-md rounded">
        @csrf

        <div class="mb-4">
            <label for="title" class="block font-medium mb-2">Title</label>
            <input type="text" name="title" id="title" value="{{ old('title') }}" class="w-full border-gray-300 rounded-lg shadow-sm" required>
            @error('title') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div class="mb-4">
            <label for="description" class="block font-medium mb-2">Description</label>
            <textarea name="description" id="description" rows="5" class="w-full border-gray-300 rounded-lg shadow-sm" required>{{ old('description') }}</textarea>
            @error('description') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div class="mb-4">
            <label for="category_id" class="block font-medium mb-2">Category</label>
            <select name="category_id" id="category_id" class="w-full border-gray-300 rounded-lg shadow-sm" required>
                <option value="" disabled selected>Select a Category</option>
                @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
            </select>
            @error('category_id') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div class="mb-4">
            <label for="price" class="block font-medium mb-2">Price</label>
            <input type="number" name="price" id="price" value="{{ old('price') }}" step="0.01" class="w-full border-gray-300 rounded-lg shadow-sm" required>
            @error('price') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div class="mb-4">
            <label for="file" class="block font-medium mb-2">File</label>
            <input type="file" name="file" id="file" class="w-full border-gray-300 rounded-lg shadow-sm" required>
            @error('file') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Save</button>
            <a href="{{ route('admin.resources.index') }}" class="text-gray-500 hover:underline ml-4">Cancel</a>
        </div>
    </form>
</div>
@endsection
