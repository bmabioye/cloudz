@extends('layouts.admin')

@section('content')
<div class="container mx-auto py-6">
    <h2 class="text-2xl font-bold mb-4">Create New Coupon</h2>

    <form action="{{ route('coupons.store') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label for="code" class="block text-sm font-medium text-gray-700">Coupon Code</label>
            <input type="text" name="code" id="code" value="{{ old('code') }}" 
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
            @error('code')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="discount_amount" class="block text-sm font-medium text-gray-700">Discount Amount</label>
            <input type="number" name="discount_amount" id="discount_amount" value="{{ old('discount_amount') }}" 
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
            @error('discount_amount')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="discount_type" class="block text-sm font-medium text-gray-700">Discount Type</label>
            <select name="discount_type" id="discount_type" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                <option value="percentage" {{ old('discount_type') == 'percentage' ? 'selected' : '' }}>Percentage</option>
                <option value="fixed" {{ old('discount_type') == 'fixed' ? 'selected' : '' }}>Fixed</option>
            </select>
            @error('discount_type')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="valid_from" class="block text-sm font-medium text-gray-700">Valid From</label>
            <input type="date" name="valid_from" id="valid_from" value="{{ old('valid_from') }}" 
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
            @error('valid_from')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="valid_until" class="block text-sm font-medium text-gray-700">Valid Until</label>
            <input type="date" name="valid_until" id="valid_until" value="{{ old('valid_until') }}" 
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
            @error('valid_until')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="usage_limit" class="block text-sm font-medium text-gray-700">Usage Limit</label>
            <input type="number" name="usage_limit" id="usage_limit" value="{{ old('usage_limit') }}" 
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
            @error('usage_limit')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Create Coupon
        </button>
        <a href="{{ route('admin.coupons.index') }}" class="text-gray-500 hover:underline ml-4">Cancel</a>
    </form>
</div>
@endsection
