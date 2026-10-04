<?php

namespace App\Mail;

use App\Models\Bill;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class BillJobAdMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public Bill $bill)
    {
        //
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Bill Job Ad',
            from: 'noreply@studentjobs.test',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'mail.billJobAd',
            with: ['bill' => $this->bill]
        );
    }

    public function attachments(): array
    {
        return [
            Attachment::fromStorage('app/public/storage/job-bills'.$this->bill->bill_number.'.pdf')
            ->as($this->bill->bill_number)
            ,
        ];
    }
}
