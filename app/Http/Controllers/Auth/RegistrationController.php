<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegistrationRequest;
use App\Http\Requests\UserRequest;
use App\Models\Group;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegistrationController extends Controller
{

    
    public function __construct()
    {
        $this->menu['main_menu'] = '';
        $this->menu['sub_menu'] = '';
        
    }
    public function index()
    {
        $group = Group::all();
        return view('Registration.index', ['groups' => $group], $this->menu);
    }

    
    public function register(RegistrationRequest $request)
    {
        $user = new User();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        // $user->password = $request->password;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->group_id = $request->group_id;

        if ($request->file('image')) {
            $file = $request->file('image')->store('Image', 'public');
            $user->image = $file;
        }

        $save = $user->save();

        if ($save) {
            toast('User Created Successfully!', 'success');

            return redirect()->to('login');
        }
    }

}
