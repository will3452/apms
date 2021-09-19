<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function updatePassword()
    {
        $data = request()->validate([
            'password' => 'required',
        ]);

        $data['password'] = bcrypt($data['password']);

        auth()->user()->update($data);
        return back()->withSuccess('Password Changed!');
    }

    public function show(User $user)
    {
        return view('userprofile', compact('user'));
    }
}
