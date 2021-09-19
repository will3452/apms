<?php

namespace App\Observers;

use App\Models\Attendance;

class AttendanceObserver
{
    public function creating(Attendance $attendance)
    {
        $attendance['teacher_id'] = auth()->id();
    }
}
