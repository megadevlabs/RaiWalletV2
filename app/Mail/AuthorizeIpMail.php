<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class AuthorizeIpMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($authorizedIpModel)
    {
        $this->authorizedIpModel = $authorizedIpModel;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.ipAuth')
                    ->from('support@nanowallet.io', 'NanoWallet Support')
                    ->subject('Authorize new IP')
                    ->with(['authorizedIpModel' => $this->authorizedIpModel]);
    }
}
