<?php

namespace App\Observers;

use App\Models\Grade;

class GradeObserver
{
    public function creating(Grade $grade)
    {
        $grade['teacher_id'] = auth()->id();
        $grade['remark'] = $grade->value < 75  ? 'failed' : 'passed';
    }
}
