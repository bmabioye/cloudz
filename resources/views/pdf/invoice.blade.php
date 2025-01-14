<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Invoice #{{ $invoice->invoice_number }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .invoice-header {
            text-align: center;
            margin-bottom: 20px;
        }
        .invoice-details, .invoice-footer {
            width: 100%;
            margin-top: 20px;
        }
        .invoice-details th, .invoice-details td {
            text-align: left;
            padding: 5px;
        }
        .invoice-footer {
            text-align: center;
            margin-top: 40px;
        }
    </style>
</head>
<body>
    <div class="invoice-header">
        <h1>Invoice</h1>
        <p>Invoice #: {{ $invoice->invoice_number }}</p>
        <p>Date: {{ $invoice->created_at->format('d M Y') }}</p>
    </div>

    <table class="invoice-details">
        <tr>
            <th>Customer:</th>
            <td>{{ $invoice->user->name }}</td>
        </tr>
        <tr>
            <th>Email:</th>
            <td>{{ $invoice->user->email }}</td>
        </tr>
        <tr>
            <th>Total Amount:</th>
            <td>${{ number_format($invoice->total_amount, 2) }}</td>
        </tr>
        <tr>
            <th>Status:</th>
            <td>{{ ucfirst($invoice->status) }}</td>
        </tr>
    </table>

    <div class="invoice-footer">
        <p>Thank you for your purchase!</p>
    </div>
</body>
</html>
