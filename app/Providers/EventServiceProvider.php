<?php

namespace App\Providers;

use App\Models\Absent;
use App\Models\Attendance;
use App\Models\Fee;
use App\Models\Grade;
use App\Models\Guardian;
use App\Models\Message;
use App\Models\Schedule;
use App\Models\Student;
use App\Models\Teacher;
use App\Observers\AbsentObserver;
use App\Observers\AttendanceObserver;
use App\Observers\FeeObserver;
use App\Observers\GradeObserver;
use App\Observers\GuardianObserver;
use App\Observers\MessageObserver;
use App\Observers\ScheduleObserver;
use App\Observers\StudentObserver;
use App\Observers\TeacherObserver;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        Attendance::observe(AttendanceObserver::class);
        Grade::observe(GradeObserver::class);
        Guardian::observe(GuardianObserver::class);
        Student::observe(StudentObserver::class);
        Teacher::observe(TeacherObserver::class);
        Schedule::observe(ScheduleObserver::class);
        Fee::observe(FeeObserver::class);
        Message::observe(MessageObserver::class);
        Absent::observe(AbsentObserver::class);
    }
}
