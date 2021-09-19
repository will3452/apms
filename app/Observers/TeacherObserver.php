<?php

namespace App\Observers;

use App\Models\Teacher;

class TeacherObserver
{
    public function creating(Teacher $t)
    {
        $t['type'] = 'teacher';
    }
}
