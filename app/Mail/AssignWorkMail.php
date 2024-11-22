<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AssignWorkMail extends Mailable
{
    use Queueable, SerializesModels;

    public $lead;
    public $subAdmin;

    /**
     * Create a new message instance.
     *
     * @param $lead
     * @param $subAdmin
     */
    public function __construct($lead, $subAdmin)
    {
        $this->lead = $lead;
        $this->subAdmin = $subAdmin;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('New Work Assigned')
                    ->view('mail.assign_work')
                    ->with([
                        'lead' => $this->lead,
                        'subAdmin' => $this->subAdmin,
                    ]);
    }
}
