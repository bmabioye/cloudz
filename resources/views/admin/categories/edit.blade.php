@extends('layouts.admin')

@section('content')
<div class="container mx-auto py-6">
    <h1 class="text-2xl font-bold mb-4">Edit Category</h1>

    <form action="{{ route('categories.update', $category->id) }}" method="POST" class="bg-white p-6 shadow-md rounded">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="name" class="block font-medium mb-2">Category Name</label>
            <input type="text" name="name" id="name" value="{{ old('name', $category->name) }}" class="w-full border-gray-300 rounded-lg shadow-sm" required>
            @error('name') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div class="mb-4">
            <label for="slug" class="block font-medium mb-2">Slug</label>
            <input type="text" name="slug" id="slug" value="{{ old('slug', $category->slug) }}" class="w-full border-gray-300 rounded-lg shadow-sm" required>
            @error('slug') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Update Category</button>
            <a href="{{ route('admin.categories.index') }}" class="text-gray-500 hover:underline ml-4">Cancel</a>
        </div>
    </form>
</div>
@endsection
