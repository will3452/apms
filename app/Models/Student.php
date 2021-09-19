<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Spatie\Permission\Traits\HasRoles;

class Student extends User
{
    use HasRoles;
    protected $table = 'users';

    protected $guard_name = 'web';

    public function classrooms()
    {
        return $this->belongsToMany(ClassRoom::class);
    }

    public function getClassRoomNameAttribute()
    {
        $data = $this->classrooms()->get()->pluck('name')->toArray();
        if (empty($data)) {
            return 'N/a';
        }

        return implode(', ', $data);
    }

    protected static function booted()
    {
        static::addGlobalScope('student', function (Builder $builder) {
            $builder->where('type', 'student');
        });
    }

}
