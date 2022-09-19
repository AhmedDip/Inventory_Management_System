<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserPurchasesController extends Controller
{
    public function index($id)
    {
        $users = User::findorFail($id);
        $tab = 'purchases';

        return view('Users.purchases.purchases', ['users'=>$users])->with('tab',$tab);

    }
}
