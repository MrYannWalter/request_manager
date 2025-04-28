<?php

namespace App\Mail;

use App\Models\Requests;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RequestSentToResponsableMail extends Mailable
{
    use Queueable, SerializesModels;

    public $request;
    public $responsable;

    public function __construct(Requests $request, User $responsable)
    {
        $this->request = $request;
        $this->responsable = $responsable;
    }

    public function build()
    {
        return $this->subject('Requête envoyée au responsable')
                    ->markdown('emails.request_sent_to_responsable');
    }
}
