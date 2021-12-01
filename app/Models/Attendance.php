<?php

namespace App\Models;

use App\Mail\AbsentReport;
use Illuminate\Support\Facades\Mail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Attendance extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }


    public function sendAbsentReport()
    {
        $presentId = $this->users()->get()->pluck('id');
        $notPresents = Student::whereNotIn('id', $presentId)->get();

        foreach ($notPresents as $student) {
            $parent = $student->guardian;
            Mail::to($parent->email)->send(new AbsentReport($parent, $student));
        }
    }
}
