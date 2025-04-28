<?php

namespace App\Mail;

use App\Models\Requests;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RequestSubmittedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $userRequest;
    public $agentName;

    /**
     * Create a new message instance.
     *
     * @param  UserRequest  $userRequest
     * @param  string  $agentName
     * @return void
     */
    public function __construct(Requests $userRequest, $agentName)
    {
        $this->userRequest = $userRequest;
        $this->agentName = $agentName;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.request_submitted')
                    ->with([
                        'requestTitle' => $this->userRequest->request_title,
                        'requestDescription' => $this->userRequest->request_description,
                        'priority' => $this->userRequest->priority,
                        'agentName' => $this->agentName,  // Inclure le nom de l'agent dans l'email
                    ]);
    }
}
