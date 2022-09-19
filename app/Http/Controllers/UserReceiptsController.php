<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserReceiptsController extends Controller
{
    public function index($id)
    {
        $users = User::findorFail($id);
        $tab = 'receipts';

        return view('Users.receipts.receipts', ['users'=>$users])->with('tab',$tab);

    }
}
