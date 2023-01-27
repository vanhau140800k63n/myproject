<?php

namespace App\Mail;

use App\Config\AuthConstants;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class RegisterAccount extends Mailable
{
    use Queueable, SerializesModels;

    protected $email;
    protected $user_id;
    protected $token;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($email, $user_id, $token)
    {
        $this->email = $email;
        $this->user_id = $user_id;
        $this->token = $token;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: 'Đăng ký tài khoản',
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            view: 'admin.email.register',
            with: [
                'email' => $this->email,
                'user_id' => $this->user_id,
                'token' => $this->token
            ],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}
