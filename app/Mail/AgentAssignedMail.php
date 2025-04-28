<?php

namespace App\Mail;

use App\Models\Requests;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AgentAssignedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $userRequest;

    /**
     * Create a new message instance.
     *
     * @param  UserRequest  $userRequest
     * @return void
     */
    public function __construct(Requests $userRequest)
    {
        $this->userRequest = $userRequest;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Nouvelle requête à traiter')
                    ->view('emails.agent_assigned')
                    ->with([
                        'requestTitle' => $this->userRequest->request_title,
                        'studentName' => $this->userRequest->user->name,
                        'priority' => $this->userRequest->priority,
                    ]);
    }
}
