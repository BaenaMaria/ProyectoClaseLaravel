<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NuevaIncidencia extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($ticket)
    {
         $this->ticket = $ticket;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        //  return $this->from('no-reply@gescomve.com', 'Sistema Automatizado de Envio de Notificaciones')
        // ->subject('Registro de un nueva incidencia')
        // ->view('email.nueva-incidencia',
        // ['ticket' => $this->ticket]);
    }
}
