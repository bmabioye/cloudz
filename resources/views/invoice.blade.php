<!DOCTYPE html>
<html>
<head>
    <title>Invoice #{{ $invoice->id }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .invoice-header {
            text-align: center;
            margin-bottom: 20px;
        }
        .invoice-details {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="invoice-header">
        <h1>Invoice</h1>
        <p>Invoice ID: {{ $invoice->id }}</p>
        <p>Date: {{ $invoice->created_at->format('d/m/Y') }}</p>
    </div>

    <div class="invoice-details">
        <p><strong>Customer:</strong> {{ $user->name }}</p>
        <p><strong>Email:</strong> {{ $user->email }}</p>
        <h3>Purchased Items</h3>
        <ul>
            @foreach($items as $item)
                <li>{{ $item->title }} - ${{ number_format($item->price, 2) }}</li>
            @endforeach
        </ul>
        <p><strong>Total:</strong> ${{ number_format($total, 2) }}</p>
    </div>
</body>
</html>
