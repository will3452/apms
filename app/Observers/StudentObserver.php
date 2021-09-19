<?php

namespace App\Observers;

use App\Models\Student;

class StudentObserver
{
    public function creating(Student $st)
    {
        $st['type'] = 'student';
    }
}
