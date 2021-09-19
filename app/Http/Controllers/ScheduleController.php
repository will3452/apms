<?php

namespace App\Http\Controllers;

use App\Models\ClassRoom;

class ScheduleController extends Controller
{
    public function show($id)
    {
        $class = ClassRoom::find($id);
        return view('schedules', compact('class'));
    }
}
