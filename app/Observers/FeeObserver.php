<?php

namespace App\Observers;

use App\Models\Fee;
use Illuminate\Support\Str;

class FeeObserver
{
    public function created(Fee $fee)
    {
        $ref = Str::padLeft($fee->id, 8, 0);
        $fee->update([
            'ref_id' => "F-$ref",
        ]);
    }
}
