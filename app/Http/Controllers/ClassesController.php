<?php

namespace App\Http\Controllers;

use App\Models\User;

class ClassesController extends Controller
{
    public function show(User $user)
    {
        return view('classes', ['classes' => $user->classes()->latest()->get()]);
    }
}
