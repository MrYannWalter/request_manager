<?php

namespace App\Mail;

use App\Models\Requests;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RequestStatusUpdatedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $request;

    public function __construct(Requests $request)
    {
        $this->request = $request;
    }

    public function build()
    {
        return $this->subject('Mise à jour du statut de votre requête')
                    ->view('emails.request_status_updated');
    }
}
