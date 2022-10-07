<?php

namespace App\Http\Controllers;

use App\Mail\SendMail;
use App\Models\Partner;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Toaster;

class LandingPageController extends Controller
{
    public function index()
    {

        $product = Product::latest()->take(6)->get();
        $partner = Partner::latest()->take(6)->get();
        $users = User::find(1);


        return view('LandingPage.index',['products'=>$product],['partners'=>$partner])
                                            ->with('user',$users);
    }


    public function mail(Request $request)
    {

        $name = $request->name;
        $email = $request->email;
        $subject = $request->subject;
        $msg = $request->message;

        $send_mail = "rasidun.test@gmail.com";

      Mail::to($send_mail)->send(new SendMail($name,$email,$subject,$msg));

     return redirect('/')->with("mail sent successfully");
        

   
    
    }
}
