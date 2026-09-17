<?php

namespace App\Mail;

use App\Models\Application;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class StudentInfoMail extends Mailable
{
    use Queueable, SerializesModels;

     private Application $application;
    
    public function __construct(Application $application)
    {
        $this->application = $application;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Student Info Mail',
            from: 'noreply@studentjobs.test',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'mail.studentInfoMail',
            with: ['application' => $this->application],
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
