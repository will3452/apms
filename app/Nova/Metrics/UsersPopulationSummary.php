<?php

namespace App\Nova\Metrics;

use App\Models\Guardian;
use App\Models\Student;
use App\Models\Teacher;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Metrics\Partition;

class UsersPopulationSummary extends Partition
{
    /**
     * Calculate the value of the metric.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return mixed
     */
    public function calculate(NovaRequest $request)
    {
        return $this->result([
            'Students' => Student::count(),
            'Teachers' => Teacher::count(),
            'Guardians' => Guardian::count(),
        ])->colors([
            '#004AAD',
            '#7ACBCD',
            '#3C4B5F',
        ]);
    }

    /**
     * Determine for how many minutes the metric should be cached.
     *
     * @return  \DateTimeInterface|\DateInterval|float|int
     */
    public function cacheFor()
    {
        // return now()->addMinutes(5);
    }

    /**
     * Get the URI key for the metric.
     *
     * @return string
     */
    public function uriKey()
    {
        return 'users-population-summary';
    }
}
