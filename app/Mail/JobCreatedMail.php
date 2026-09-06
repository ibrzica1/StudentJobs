<?php

namespace App\Mail;

use App\Models\Job;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class JobCreatedMail extends Mailable
{
    use Queueable, SerializesModels;

    private $job;

    public function __construct(Job $job)
    {
        $this->job = $job;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Job Created Mail',
            from: 'noreply@studentjobs.test',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'mail.jobCreatedMail',
            with: ['job' => $this->job],
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
