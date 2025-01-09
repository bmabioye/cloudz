@extends('layouts.admin')

@section('content')
<div class="container mx-auto py-6">
    <h1 class="text-2xl font-bold mb-4">Add New Coupon</h1>

    <form action="{{ route('coupons.store') }}" method="POST" class="bg-white p-6 shadow-md rounded">
        @csrf

        <div class="mb-4">
            <label for="code" class="block font-medium mb-2">Coupon Code</label>
            <input type="text" name="code" id="code" value="{{ old('code') }}" class="w-full border-gray-300 rounded-lg shadow-sm" required>
            @error('code') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div class="mb-4">
            <label for="type" class="block font-medium mb-2">Discount Type</label>
            <select name="type" id="type" class="w-full border-gray-300 rounded-lg shadow-sm" required>
                <option value="percentage" {{ old('type') === 'percentage' ? 'selected' : '' }}>Percentage</option>
                <option value="fixed" {{ old('type') === 'fixed' ? 'selected' : '' }}>Fixed Amount</option>
            </select>
            @error('type') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div class="mb-4">
            <label for="value" class="block font-medium mb-2">Discount Value</label>
            <input type="number" step="0.01" name="value" id="value" value="{{ old('value') }}" class="w-full border-gray-300 rounded-lg shadow-sm" required>
            @error('value') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div class="mb-4">
            <label for="expiry_date" class="block font-medium mb-2">Expiry Date</label>
            <input type="date" name="expiry_date" id="expiry_date" value="{{ old('expiry_date') }}" class="w-full border-gray-300 rounded-lg shadow-sm">
            @error('expiry_date') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Save</button>
            <a href="{{ route('coupons.index') }}" class="text-gray-500 hover:underline ml-4">Cancel</a>
        </div>
    </form>
</div>
@endsection
