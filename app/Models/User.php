<?php

namespace App\Models;

use Illuminate\Support\Carbon;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getIsStudentAttribute()
    {
        return Student::find($this->id);
    }

    public function getIsGuardianAttribute()
    {
        return Guardian::find($this->id);
    }

    public function getIsTeacherAttribute()
    {
        return Teacher::find($this->id);
    }

    public function students()
    {
        return $this->hasMany(Student::class, 'guardian_id');
    }

    public function grades()
    {
        return $this->hasMany(Grade::class, 'student_id');
    }

    public function attendances()
    {
        return $this->belongsToMany(Attendance::class);
    }

    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }

    public function guardian()
    {
        return $this->belongsTo(Guardian::class, 'guardian_id');
    }

    public function classes()
    {
        return $this->belongsToMany(ClassRoom::class, 'class_room_student', 'student_id');
    }

    public function inMessages()
    {
        return $this->hasMany(Message::class, 'receiver_id');
    }

    public function outMessages()
    {
        return $this->hasMany(Message::class, 'sender_id');
    }

    public function activities()
    {
        return $this->hasMany(Activity::class);
    }

    public function certificates()
    {
        return $this->hasMany(Certificate::class);
    }

    public function getLatestGradesAttribute()
    {
        return $this->grades()->latest()->get()->groupBy('year')->first()->groupBy('subject_id');
    }

    public function getLatestGradesAverageAttribute()
    {
        $sum = 0;
        $count = 0;
        $grades = $this->grades()->latest()->get()->groupBy('year')->first();
        foreach ($grades as $grade) {
            $sum += $grade->value;
            $count++;
        }

        return number_format($sum / $count, 2);
    }

    public function isPresent($date)
    {
        $attendancesId = $this->attendances->pluck('id');
        return Attendance::whereIn('id', $attendancesId->toArray())->whereDate('created_at', $date)->count();
    }
}
