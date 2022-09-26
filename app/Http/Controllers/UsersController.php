<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\Group;
use App\Models\User;
use Illuminate\Http\Request;
use Alert;
use App\Http\Requests\UserEditRequest;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert as EditAlert;

class UsersController extends Controller
{

    public function __construct()
    {
        $this->menu['main_menu'] = 'user';
        $this->menu['sub_menu'] = 'user';
        
    }

    public function index()
    {
        $user = User::all()->except(1);


        // dd($user);

        return view('Users.user', ['users' => $user], $this->menu);
    }

    public function create()
    {
        $group = Group::all();
        return view('Users.create', ['groups' => $group], $this->menu);
    }


    public function store(UserRequest $request)
    {
        $user = new User();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password) ;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->group_id = $request->group_id;
        $user->status = $request->status;

        if ($request->file('image')) {
            $file = $request->file('image')->store('Image', 'public');
            $user->image = $file;
        }

        $save = $user->save();

        if ($save) {
            toast('User Created Successfully!', 'success');

            return redirect()->to('users')->with($this->menu);
        }
    }


    public function show($id)
    {
        $user = User::findorFail($id);
        $group = Group::all();
        $tab = 'show';
        return view('Users.show', ["users" => $user], ['groups' => $group])
                ->with('tab',$tab)
                ->with($this->menu);
    }

    public function edit($id)
    {

        $user = User::findorFail($id);
        $group = Group::all();
        return view('Users.edit', ["users" => $user], ['groups' => $group])->with($this->menu);
    }


    public function update(UserEditRequest $request, $id)
    {
        $id = $request->id;
        $user = User::find($id);


        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password) ;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->group_id = $request->group_id;
        $user->status = $request->status;



        if ($request->hasFile('image')) {
            $des = 'public/' . $user->image;
            if (Storage::exists($des)) {
                // unlink($des);
                Storage::delete($des);
                // File::delete($des);



            }
            $users = $request->file('image')->store('Image', 'public');
            $user->image = $users;
        }
        $user->update();

        EditAlert::toast('You\'ve Successfully Edited', 'success');
        return redirect()->route('users.index')   
                         ->with($this->menu);;
    }

    public function destroy($id)
    {
        $user = User::find($id);
        // $des= 'public/' . $destroy->image;
        if ($user) {
            // File::delete($des);
            Storage::delete('public/' . $user->image);
            $user->delete();
            Session::flash('delete', 'User deleted Successsfully');
        }

        return redirect('/users')
                 ->with($this->menu);;
    }
}
