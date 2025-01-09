@extends('layouts.admin')

@section('content')
<div class="container mx-auto py-6">
    <h1 class="text-2xl font-bold mb-4">Manage Categories</h1>
    <a href="{{ route('categories.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 mb-4 inline-block">Add New Category</a>

    @if(session('success'))
        <div class="bg-green-100 text-green-800 px-4 py-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto">
        <table class="w-full border-collapse bg-white shadow-md">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border p-4 text-left">Name</th>
                    <th class="border p-4 text-left">Slug</th>
                    <th class="border p-4 text-left">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                <tr class="hover:bg-gray-100">
                    <td class="border p-4">{{ $category->name }}</td>
                    <td class="border p-4">{{ $category->slug }}</td>
                    <td class="border p-4">
                        <a href="{{ route('categories.edit', $category->id) }}" class="text-blue-500 hover:underline">Edit</a>
                        <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="inline-block ml-2">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:underline" onclick="return confirm('Are you sure you want to delete this category?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $categories->links() }}
    </div>
</div>
@endsection
