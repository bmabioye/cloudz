@extends('layouts.admin')

@section('content')
<div class="container mx-auto py-6">
    <h1 class="text-2xl font-bold mb-4">Manage Resources</h1>
    <a href="{{ route('resources.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 mb-4 inline-block">Add New Resource</a>

    @if(session('success'))
        <div class="bg-green-100 text-green-800 px-4 py-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto">
        <table class="w-full border-collapse bg-white shadow-md">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border p-4 text-left">Title</th>
                    <th class="border p-4 text-left">Description</th>
                    <th class="border p-4 text-left">Category</th>
                    <th class="border p-4 text-left">Price</th>
                    <th class="border p-4 text-left">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($resources as $resource)
                <tr class="hover:bg-gray-100">
                    <td class="border p-4">{{ $resource->title }}</td>
                    <td class="border p-4">{{ $resource->description ?? 'No Description' }}</td>
                    <td class="border p-4">{{ $resource->category->name ?? 'Uncategorized' }}</td>
                    <td class="border p-4">${{ number_format($resource->price, 2) }}</td>
                    <td class="border p-4">
                        <a href="{{ route('resources.edit', $resource->id) }}" class="text-blue-500 hover:underline">Edit</a>
                        <form action="{{ route('resources.destroy', $resource->id) }}" method="POST" class="inline-block ml-2">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:underline" onclick="return confirm('Are you sure you want to delete this resource?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $resources->links() }}
    </div>
</div>
@endsection
