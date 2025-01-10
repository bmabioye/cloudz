@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-4">
    <h2 class="text-2xl font-bold mb-4">Edit Plan</h2>

    <form action="{{ route('plans.update', $plan->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700">Plan Name</label>
            <input type="text" name="name" id="name" value="{{ old('name', $plan->name) }}"
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
            @error('name')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="description" class="block text-sm font-medium text-gray-700">Plan Description</label>
            <textarea name="description" id="description" rows="3"
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">{{ old('description', $plan->description) }}</textarea>
            @error('description')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="price" class="block text-sm font-medium text-gray-700">Price</label>
            <input type="number" name="price" id="price" step="0.01" value="{{ old('price', $plan->price) }}"
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
            @error('price')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="duration_months" class="block text-sm font-medium text-gray-700">Duration (in Months)</label>
            <input type="number" name="duration_months" id="duration_months" value="{{ old('duration_months', $plan->duration_months) }}"
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
            @error('duration_months')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="features" class="block text-sm font-medium text-gray-700">Features (comma-separated)</label>
            <textarea name="features" id="features" rows="3"
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">{{ old('features', $plan->features ? implode(',', $plan->features) : '') }}</textarea>
            <small class="text-gray-500">Separate each feature with a comma.</small>
            @error('features')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="coupon_id" class="block text-sm font-medium text-gray-700">Coupon</label>
            <select name="coupon_id" id="coupon_id" class="mt-1 block w-full border-gray-300 rounded-md">
                <option value="">Select a Coupon</option>
                @foreach ($coupons as $coupon)
                <option value="{{ $coupon->id }}" {{ old('coupon_id', $plan->coupon_id) == $coupon->id ? 'selected' : '' }}>
                    {{ $coupon->code }} ({{ $coupon->discount_percentage }}% off)
                </option>
                @endforeach
            </select>
            @error('coupon_id')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit"
            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Update Plan
        </button>
        <a href="{{ route('admin.plans.index') }}" class="text-gray-500 hover:underline ml-4">Cancel</a>
    </form>
</div>
@endsection
