<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserPaymentsController extends Controller
{
   
    
    public function index($id)
    {
        $users = User::findorFail($id);
        $tab = 'payments';

        return view('Users.payments.payments', ['users'=>$users])->with('tab',$tab);

    }

}
