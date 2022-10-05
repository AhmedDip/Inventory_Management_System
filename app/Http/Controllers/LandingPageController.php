<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index()
    {

        $product = Product::latest()->take(6)->get();
        $users = User::find(1);


        return view('LandingPage.index',['products'=>$product], ['user'=>$users]);
    }
}
