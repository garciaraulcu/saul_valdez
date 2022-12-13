<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Correo extends Mailable
{
    use Queueable, SerializesModels;

    private $mailTo;
    private $mailSubject;
    // the values that shouldnt appear in the mail should be private

    public $content;
    public $pedido;
    // public properties are accessible from the view

    /**
     * Create a new message instance.
     *
     * @param LayoutMailRawRequest $request
     */
    public function __construct($to, $subject, $content, $pedido)
    {
        $this->content = $content;
        $this->mailSubject = $subject;
        $this->mailTo = $to;
        $this->pedido = $pedido;
    }

    /**
     * Build the message.
     *
     * @throws \Exception
     */
    public function build()
    {
         $this->view('emails.correo');

         $this->subject($this->mailSubject)
              ->to($this->mailTo);
    }
}
