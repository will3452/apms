<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Spatie\Permission\Traits\HasRoles;

class Student extends User
{
    use HasRoles;
    protected $table = 'users';

    protected $guard_name = 'web';


    protected static function booted()
    {
        static::addGlobalScope('student', function (Builder $builder) {
            $builder->where('type', 'student');
        });
    }
}
