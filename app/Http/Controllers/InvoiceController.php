<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use App\Models\Invoice;

class InvoiceController extends Controller
{
    public function download($id)
    {
        // $invoice = Invoice::findOrFail($id);
        $invoice = Invoice::with(['user', 'order'])->findOrFail($id);
    
        $pdf = PDF::loadView('pdf.invoice', ['invoice' => $invoice]);
        return $pdf->download('invoice_' . $invoice->invoice_number . '.pdf');
    }
}
