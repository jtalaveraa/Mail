<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\User;


class ActivarCuenta extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $url;

    public function __construct(User $user, String $url){
        $this->user = $user;
        $this->url = $url;
    }
    
    public function envelope(){
        return new Envelope(
            subject: 'Activar Cuenta',
        );
    }

    public function content(){
        return new Content(
            view: 'mail.activarCuenta',
            with: [
                'user' => $this->user,
                'url' => $this->url
            ]
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
