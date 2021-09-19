<?php

namespace App\Http\Controllers;

use App\Models\User;

class GradeController extends Controller
{
    public function show(User $user)
    {
        $grades = $user->grades()->latest()->get();

        return view('grades', compact('grades'));
    }
}
