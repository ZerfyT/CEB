<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Attachment;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SendPDFEmail extends Mailable
{
    use Queueable, SerializesModels;

    // public $data;
    public $pdfPath;

    public $subject;

    /**
     * Create a new message instance.
     */
    public function __construct($pdfPath, $subject)
    {
        // $this->data = $data;
        $this->pdfPath = $pdfPath;
        $this->subject = $subject;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: $this->subject,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'layouts.payment_receipt_email_content',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [
            Attachment::fromPath($this->pdfPath)
                ->as('mybill.pdf')
                ->withMime('application/pdf'),
        ];
    }
}
