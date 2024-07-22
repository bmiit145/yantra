<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class inviteMail extends Mailable
{
    use Queueable, SerializesModels;

    public $link;
    public $user;

    /**
     * Create a new message instance.
     */
    public function __construct($link, $user)
    {
        $this->link = $link;
        $this->user = $user;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Invite Mail',
        );
    }

    public function build()
{
    return $this->view('settings.users.invite')
                ->subject('You are invited')
                ->with([
                    'link' => $this->link,
                    'user' => $this->user,
                ]);
}

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        // return new Content(
        //     view: 'view.name',
        // );
        return new Content(
            view: 'settings.users.invite',
            with: [
                'link' => $this->link,
                'user' => $this->user,
            ],
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
