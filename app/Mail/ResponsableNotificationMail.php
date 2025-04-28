<?php

namespace App\Mail;

use App\Models\Requests;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ResponsableNotificationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $request;

    public function __construct(Requests $request)
    {
        $this->request = $request;
    }

    public function build()
    {
        return $this->subject('Nouvelle requête recu')
                    ->markdown('emails.responsable_notification');
    }
}
