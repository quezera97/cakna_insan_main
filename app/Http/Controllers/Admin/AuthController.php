<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    public function indexLogin()
    {
        return view('admin.auth.login');
    }
}
