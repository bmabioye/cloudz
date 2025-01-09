@extends('layouts.admin')

@section('content')
<div class="container mx-auto py-6">
    <h1 class="text-2xl font-bold mb-4">Edit Plan</h1>

    <form action="{{ route('plans.update', $plan->id) }}" method="POST" class="bg-white p-6 shadow-md rounded">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="name" class="block font-medium mb-2">Plan Name</label>
            <input type="text" name="name" id="name" value="{{ old('name', $plan->name) }}" class="w-full border-gray-300 rounded-lg shadow-sm" required>
            @error('name') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div class="mb-4">
            <label for="price" class="block font-medium mb-2">Price ($)</label>
            <input type="number" step="0.01" name="price" id="price" value="{{ old('price', $plan->price) }}" class="w-full border-gray-300 rounded-lg shadow-sm" required>
            @error('price') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div class="mb-4">
            <label for="duration" class="block font-medium mb-2">Duration</label>
            <select name="duration" id="duration" class="w-full border-gray-300 rounded-lg shadow-sm" required>
                <option value="monthly" {{ old('duration', $plan->duration) === 'monthly' ? 'selected' : '' }}>Monthly</option>
                <option value="yearly" {{ old('duration', $plan->duration) === 'yearly' ? 'selected' : '' }}>Yearly</option>
            </select>
            @error('duration') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div class="mb-4">
            <label for="features" class="block font-medium mb-2">Features (comma-separated)</label>
            <textarea name="features" id="features" rows="3" class="w-full border-gray-300 rounded-lg shadow-sm" required>{{ old('features', implode(',', $plan->features)) }}</textarea>
            <small class="text-gray-500">Separate each feature with a comma.</small>
            @error('features') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Update</button>
            <a href="{{ route('plans.index') }}" class="text-gray-500 hover:underline ml-4">Cancel</a>
        </div>
    </form>
</div>
@endsection
