<?php

namespace App\Http\Controllers;

use Laravel\Nova\Nova;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = auth()->user();

        if (!in_array($user->type, ['guardian', 'student'])) {
            return redirect(Nova::path());
        }
        return view('home', compact('user'));
    }
}
