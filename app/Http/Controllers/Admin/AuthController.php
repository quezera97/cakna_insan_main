<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function indexLogin()
    {
        return view('admin.auth.login');
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('login');
    }
}
