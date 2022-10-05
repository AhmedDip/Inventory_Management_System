<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Group;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class ProfileController extends Controller
{

    public function __construct()
    {
        Parent::__construct();
        $this->menu['main_menu'] = '';
        $this->menu['sub_menu'] = '';
        $this->menu['user'] = User::find(1);
        $this->menu['count']=  $this->menu['user']->unreadNotifications->count();
    

        
    }

  
    public function show($id)
    {
        $this->menu['user'] = User::find(1);
        $id = Auth::user()->id;
        $user = User::findorFail($id);
        $group = Group::all();
        return view('Profile.show', ["users" => $user], ['groups' => $group])->with($this->menu);
    }
    
}
