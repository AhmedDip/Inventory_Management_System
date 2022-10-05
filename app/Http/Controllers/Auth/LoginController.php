<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\User;
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
            
            if (Auth::user()->group_id==1) {
                return redirect()->to(route('dashboard'));

            }

            elseif (Auth::user()->group_id!=1)
            {
                $id = Auth::user()->id;
                $user = User::findorFail($id);
        
                return redirect()->to(route('user.dashboard'));
            }
                
            }
           
 
         
        


        else if (Auth::attempt(['email' => $email, 'password' => $password, 'status' => 2])) 
        {
            return redirect()->route('login')->with('invalid','Your Account is Pending, Please Contact with Admin');
        }

        else if (Auth::attempt(['email' => $email, 'password' => $password, 'status' => 0])) 
        {
            return redirect()->route('login')->with('invalid','Sorry, Your Account is Suspend');
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
