<?php

namespace App\Observers;

use App\Models\Message;

class MessageObserver
{
    public function creating(Message $msg)
    {
        $msg['sender_id'] = auth()->id();
    }
}
