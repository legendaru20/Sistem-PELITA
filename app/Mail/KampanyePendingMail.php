<?php

namespace App\Mail;

use App\Models\Kampanye;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class KampanyePendingMail extends Mailable
{
    use Queueable, SerializesModels;

    public $kampanye;

    /**
     * Create a new message instance.
     */
    public function __construct(Kampanye $kampanye)
    {
        $this->kampanye = $kampanye;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Status Kampanye Anda Diubah Kembali ke Pending',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'emails.kampanye.pending',
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
