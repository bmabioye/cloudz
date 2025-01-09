@extends('layouts.admin')

@section('content')
<div>
    <h1>{{ isset($coupon) ? 'Edit' : 'Add' }} Coupon</h1>

    <form action="{{ isset($coupon) ? route('coupons.update', $coupon->id) : route('coupons.store') }}" method="POST">
        @csrf
        @if (isset($coupon))
            @method('PUT')
        @endif

        <div class="form-group">
            <label for="code">Code</label>
            <input type="text" name="code" id="code" class="form-control" value="{{ old('code', $coupon->code ?? '') }}" required>
        </div>

        <div class="form-group">
            <label for="discount_percentage">Discount Percentage</label>
            <input type="number" name="discount_percentage" id="discount_percentage" class="form-control" value="{{ old('discount_percentage', $coupon->discount_percentage ?? '') }}" required>
        </div>

        <div class="form-group">
            <label for="valid_from">Valid From</label>
            <input type="datetime-local" name="valid_from" id="valid_from" class="form-control" value="{{ old('valid_from', optional($coupon->valid_from)->format('Y-m-d\TH:i') ?? '') }}">
        </div>

        <div class="form-group">
            <label for="valid_until">Valid Until</label>
            <input type="datetime-local" name="valid_until" id="valid_until" class="form-control" value="{{ old('valid_until', optional($coupon->valid_until)->format('Y-m-d\TH:i') ?? '') }}">
        </div>

        <div class="form-group">
            <label for="usage_limit">Usage Limit</label>
            <input type="number" name="usage_limit" id="usage_limit" class="form-control" value="{{ old('usage_limit', $coupon->usage_limit ?? '') }}">
        </div>

        <button type="submit" class="btn btn-success">{{ isset($coupon) ? 'Update' : 'Create' }}</button>
    </form>
</div>
@endsection
