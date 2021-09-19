<?php

namespace App\Observers;

use App\Models\Guardian;

class GuardianObserver
{
    public function creating(Guardian $guardian)
    {
        $guardian['type'] = 'guardian';
    }
}
