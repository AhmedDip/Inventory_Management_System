<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\Group;
use App\Models\User;
use Illuminate\Http\Request;
use Alert;
use App\Http\Requests\UserEditRequest;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();


        // dd($user);

        return view('Users.user',['users'=>$user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $group = Group::all();


        return view('Users.create',['groups'=>$group]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $user = new User();
        
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->group_id = $request->group_id;
        $user->status = $request->status;
       
        if($request->file('image')){
            $file= $request->file('image')->store('Image','public');
            $user->image= $file;
        }

        $save= $user->save();

        if($save)
        {
            toast('User Created Successfully!','success');
    
            return redirect()->to('users');
            
        }

     

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findorFail($id);
        $group = Group::all();
        return view('Users.edit',["users"=>$user],['groups'=>$group]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserEditRequest $request, $id)
    {
        $id = $request->id;

        $user = User::find($id);

       
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->group_id = $request->group_id;
        $user->status = $request->status;
      

   
        if($request->hasFile('image'))
        {
            $des= 'public/' . $user->image;
            if (File::exists($des))
            {
                Storage::delete('public/' .$user->image);
                File::delete($des);
              
            }
            $std = $request->file('image')->store('Image', 'public');
            $user->image = $std;
          
    
        }
        $user->save();
       
        // $user->image = $user;
        // dd($student);
     
        Alert::toast('You\'ve Successfully Registered', 'success');
        return redirect()->route('users.index');
 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        // $des= 'public/' . $destroy->image;
      if($user)
      {
        // File::delete($des);
        Storage::delete('public/' .$user->image);
        $user->delete();
        Session::flash('delete', 'User deleted Successsfully');
      }

      return redirect('/users');
    }
    
}
