@extends('layouts.admin')

@section('content')
<div class="container mx-auto py-6">
    <h1 class="text-2xl font-bold mb-4">Manage Subscription Plans</h1>
    <a href="{{ route('plans.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 mb-4 inline-block">Add New Plan</a>

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
                    <th class="border p-4 text-left">Description</th>
                    <th class="border p-4 text-left">Price</th>
                    <th class="border p-2 text-left">Duration (in Months)</th>
                    <th class="border p-6 text-left">Features</th>
                    <th class="border p-4 text-left">Status</th>
                    <th class="border p-4 text-left">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($plans as $plan)
                <tr class="hover:bg-gray-100">
                    <td class="border p-4">{{ $plan->name }}</td>
                    <td class="border p-4">{{ $plan->description }}</td>
                    <td class="border p-4">${{ number_format($plan->price, 2) }}</td>
                    <td class="border p-4">{{ ucfirst($plan->duration_months) }}</td>
                    <td class="border p-4">
                    <ul>
                        @foreach($plan->features ?? [] as $feature)
                            <li>{{ $feature }}</li>
                        @endforeach
                    </ul>
                    </td>
                    <td class="border p-4">
                    <span class="{{ $plan->status === 'active' ? 'status-active' : 'status-disabled' }}">
                        @if($plan->status === 'active')
                            <i class="fas fa-check-circle"></i>
                        @else
                            <i class="fas fa-ban"></i>
                        @endif
                        {{ ucfirst($plan->status) }}
                    </span>
                    </td>
                    <td class="border p-4">
                        <a href="{{ route('plans.edit', $plan->id) }}" class="text-blue-500 hover:underline">Edit</a>
                        <form action="{{ route('plans.destroy', $plan->id) }}" method="POST" class="inline-block ml-2">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:underline" onclick="return confirm('Are you sure you want to delete this plan?')">Delete</button>
                        </form>
                        <form action="{{ route('plans.toggleStatus', $plan->id) }}" method="POST" class="inline-block ml-2">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="text-gray-500 hover:underline">
                                {{ $plan->status === 'active' ? 'Disable' : 'Enable' }}
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $plans->links() }}
    </div>
</div>
@endsection