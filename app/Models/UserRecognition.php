<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRecognition extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function recognition()
    {
        return $this->belongsTo(Recognition::class);
    }

    public function user()
    {
        return $this->belongsTo(Student::class);
    }
}
