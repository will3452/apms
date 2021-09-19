<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class CertificateController extends Controller
{
    public function index()
    {
        $uid = request()->uid;
        $user = auth()->user();

        if (isset($uid)) {
            $user = User::find($uid);
        }

        $certificates = $user->certificates()->latest()->get();

        return view('certificates', compact('certificates'));
    }
}
