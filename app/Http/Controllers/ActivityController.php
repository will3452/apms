<?php

namespace App\Http\Controllers;

use App\Models\User;

class ActivityController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        if (request()->has('uid')) {
            $user = User::find(request()->uid);
        }
        $activities = $user->activities->groupBy('type');
        return view('activities', compact('activities'));
    }
}
