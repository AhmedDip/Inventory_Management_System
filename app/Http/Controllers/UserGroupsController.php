<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserGroupsController extends Controller
{
    public function index()
    {
        $group = Group ::where('id','!=',1)->get();

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
        Session::flash('create', 'Group Created Successfully');
      }        
        return redirect('groups');
    }

    public function destroyGroup($id)
    {
      $destroy = Group::find($id)->delete();

      if($destroy)
      {
        Session::flash('delete', 'Group deleted Successsfully');
      }

      return redirect('/groups');
    }
}
