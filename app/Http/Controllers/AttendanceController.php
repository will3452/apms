<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function index()
    {
        $uid = request()->uid;
        $user = auth()->user();

        if (isset($uid)) {
            $user = User::find($uid);
        }

        $attendances = $user->attendances()->latest()->get();

        return view('attendances', compact('attendances'));
    }
}
