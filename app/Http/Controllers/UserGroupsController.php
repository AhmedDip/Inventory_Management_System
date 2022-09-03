<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserGroupsController extends Controller
{
    public function index()
    {
        $group = Group ::all();

       // dd($user);
         return view('Groups.group',[ 'groups'=>$group ]);
    }

    public function createGroup()
    {

        return view('Groups.create');

    }

    public function storeGroup(Request $request)
    {
       $group = new Group();

      $group->title = $request->title;

      $save = $group->save();

      if($save)
      {
        Session::flash('message', 'Group Created Successfully');
      }

        
        return redirect('groups');
    }
}
