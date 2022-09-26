<?php

namespace App\Http\Controllers;

use App\Http\Requests\TitleRequest;
use App\Http\Requests\UserRequest;
use App\Models\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserGroupsController extends Controller
{

  public function __construct()
    {
        $this->menu['main_menu'] = 'user';
        $this->menu['sub_menu'] = '';
        
    }
    public function index()
    {
        $group = Group ::where('id','!=',1)->get();

       // dd($user);
         return view('Groups.group',[ 'groups'=>$group ])->with($this->menu);
    }

    public function createGroup()
    {

        return view('Groups.create')->with($this->menu);

    }

    public function storeGroup(TitleRequest $request)
    {
       $group = new Group();

      $group->title = $request->title;

      $save = $group->save();

      if($save)
      {
        Session::flash('create', 'Group Created Successfully');
      }        
        return redirect('groups')->with($this->menu);
    }

    public function destroyGroup($id)
    {
      $destroy = Group::find($id)->delete();

      if($destroy)
      {
        Session::flash('delete', 'Group deleted Successsfully');
      }

      return redirect('/groups')->with($this->menu);
    }
}
