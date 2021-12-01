<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class AbsentReport extends Mailable
{
    use Queueable, SerializesModels;
    public $parent;
    public $user;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $parent, User $user)
    {
        $this->parent = $parent;
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('AbsentReport');
    }
}
