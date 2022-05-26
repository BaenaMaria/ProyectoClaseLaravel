<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NuevoUsuario extends Mailable
{
    use Queueable, SerializesModels;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user)
    {
        $this->usuario = $user;
    }
    /**
     * Build the message and send an email.
     *
     * @return $this
     */
    public function build()
    {
         return $this->from('no-reply@gescomve.com', 'Sistema Automatizado de Envio de Notificaciones')
         ->subject('Registro de un nuevo usuario')
         ->view('email.nuevo-usuario',
         ['usuario' => $this->usuario]);


    }
}
