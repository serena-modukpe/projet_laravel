<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class changerpassword extends Mailable
{
    use Queueable, SerializesModels;
    public $contenu;
    public $subject;
    public $email;

    /**
     * Create a new message instance.
     */
    public function __construct($contenu)
    {
        //
        $this->contenu = $contenu;
        $this->subject = $contenu['subject'];
        $this->email = $contenu['email'];
    }

    /**
     * Get the message envelope.
     */
    public function build()
    {
        $date = date('d-m-Y');

        return $this->subject('sinzoganserena@gmail.com: ' . $this->subject)->from('jenniferadelakoun9@gmail.com', 'Ecole')
        ->view('emails.changer_motdepasse');

    }
}
