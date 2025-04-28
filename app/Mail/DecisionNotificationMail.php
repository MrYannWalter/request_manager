<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class DecisionNotificationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $request;
public $decision;
public $response_text;

public function __construct($request, $decision, $response_text)
{
    $this->request = $request;
    $this->decision = $decision;
    $this->response_text = $response_text;
}
    public function build()
    {
        return $this->subject('Décision concernant votre requête')
                    ->markdown('emails.decision.notification')
                    ->with([
                        'request' => $this->request,
                        'decision' => $this->decision,
                        'response_text' => $this->response_text,
                    ]);
    }
}
