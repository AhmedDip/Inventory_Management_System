<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login()
    {
        return view('Login.index');
    }

    public function authenticate(LoginRequest $request)
    {
        return $request->email;
    }
}
