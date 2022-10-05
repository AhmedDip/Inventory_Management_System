<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index()
    {

        $product = Product::latest()->take(6)->get();


        return view('LandingPage.index',['products'=>$product]);
    }
}
