<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Nova\Nova;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login()
    {
        $data = request()->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $user = User::where('email', $data['email'])->first();

        // return $user;
        if (empty($user)) {
            return back()->withError('Account not found!');
        }

        if (!Hash::check($data['password'], $user->password)) {
            return back()->withError('Account not found!');
        }

        if ($user->type == 'teacher' || $user->type == 'superadmin') {
            return redirect(Nova::path());
        }

        Auth::login($user);
        return redirect('/home');
    }

    public function updateProfile()
    {
        $data = request()->validate([
            'name' => 'required',
            'address' => 'required',
            'contact_no' => 'required',
            'gender' => '',
        ]);

        auth()->user()->update($data);

        return back()->withSuccess('Profile Updated!');
    }

    public function logout()
    {
        Auth::logout();
        return back();
    }
}
