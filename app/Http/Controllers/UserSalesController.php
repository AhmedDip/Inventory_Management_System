<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserSalesController extends Controller
{
    public function index($id)
    {
        $users = User::findorFail($id);
        $tab = 'sales';

        return view('Users.sales.sales', ['users'=>$users])->with('tab',$tab);

    }
}
