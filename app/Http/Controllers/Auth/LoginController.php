<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login()
    {
        return view('Login.index');
    }

    public function authenticate(LoginRequest $request)
    {

        $email = $request->email;
        $password= $request->password;
        
    

        
        if (Auth::attempt(['email' => $email, 'password' => $password, 'status' => 1])) {
            
            if('group_id'==1)
            {
                return redirect()->to(route('dashboard'));
            }

          else if ('group_id'!=1)
            {
                return redirect()->to(route('dashboard'));
            }
        }


        else if (Auth::attempt(['email' => $email, 'password' => $password, 'status' => 2])) 
        {
            return redirect()->route('login')->with('invalid','Your Account is Suspended');
        }

        else
        {
            return redirect()->route('login')->with('invalid','These credentials do not match our records');
        }
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->to(route('login'));
    }
}
