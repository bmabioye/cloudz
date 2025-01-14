<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\Invoice;

class InvoiceMail extends Mailable
{
    use Queueable, SerializesModels;

    // public $filePath;
    /**
     * Create a new message instance.
     */
    // public function __construct()
    // {
    //     $this->filePath = $filePath;
    // }

    // public function build()
    // {
    //     return $this->view('emails.invoice')
    //         ->subject('Your Invoice')
    //         ->attach($this->filePath, [
    //             'as' => 'invoice.pdf',
    //             'mime' => 'application/pdf',
    //         ]);
    // }


    public $invoice;

    public function __construct(Invoice $invoice)
    {
        $this->invoice = $invoice;
    }

    public function build()
    {
        return $this->view('emails.invoice')
                    ->subject('Your Invoice from CloudZone')
                    ->attachData($this->generatePDF(), 'invoice.pdf', [
                        'mime' => 'application/pdf',
                    ]);
    }

    private function generatePDF()
    {
        $pdf = \PDF::loadView('pdf.invoice', ['invoice' => $this->invoice]);
        return $pdf->output();
    }


    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Invoice Mail',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'view.name',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
