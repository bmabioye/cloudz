@extends('layouts.admin')

@section('content')
<div class="container mx-auto py-6">
    <h1 class="text-2xl font-bold mb-4">Manage Coupons</h1>
    <a href="{{ route('coupons.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 mb-4 inline-block">Add New Coupon</a>

    @if(session('success'))
        <div class="bg-green-100 text-green-800 px-4 py-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto">
        <table class="w-full border-collapse bg-white shadow-md">
        <thead>
            <tr class="bg-gray-200">
                <th class="border p-4 text-left">Code</th>
                <th class="border p-4 text-left">Discount</th>
                <th class="border p-4 text-left">Type</th>
                <th class="border p-4 text-left">Validity</th>
                <th class="border p-4 text-left">Usage</th>
                <th class="border p-4 text-left">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($coupons as $coupon)
                <tr class="hover:bg-gray-100">
                    <td class="border p-4">{{ $coupon->code }}</td>
                    <td class="border p-4">
                        @if($coupon->discount_type === 'percentage')
                            {{ $coupon->discount_percentage }}%
                        @else
                            ${{ number_format($coupon->discount_amount, 2) }}
                        @endif
                    </td>
                    <td class="border p-4">{{ ucfirst($coupon->discount_type) }}</td>
                    <td class="border p-4">
                        {{ $coupon->valid_from ? $coupon->valid_from->format('M d, Y') : 'No Start Date' }} - 
                        {{ $coupon->valid_until ? $coupon->valid_until->format('M d, Y') : 'No Expiry' }}
                    </td>
                    <td class="border p-4">{{ $coupon->used_count }} / {{ $coupon->usage_limit }}</td>
                    <td class="border p-4">
                        <a href="{{ route('coupons.edit', $coupon->id) }}" class="text-blue-500 hover:underline">Edit</a>
                        <form action="{{ route('coupons.destroy', $coupon->id) }}" method="POST" class="inline-block ml-2">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:underline" onclick="return confirm('Are you sure you want to delete this coupon?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>

        </table>
    </div>

    <div class="mt-4">
        {{ $coupons->links() }}
    </div>
</div>
@endsection
