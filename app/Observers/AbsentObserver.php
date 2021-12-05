<?php

namespace App\Observers;

use App\Mail\AbsentReport;
use App\Models\Absent;
use Illuminate\Support\Facades\Mail;

class AbsentObserver
{
    public function creted(Absent $absent)
    {
        Mail::to($absent->student->guardian->email)->send(new AbsentReport($absent->student->guardian, $absent->student));
    }
}
