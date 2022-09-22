<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class UserPaymentsController extends Controller
{
   
    
    public function index($id)
    {
        $users = User::findorFail($id);
        $tab = 'payments';

        return view('Users.payments.payments', ['users'=>$users])->with('tab',$tab);

    }

    public function store(Request $request, $id)
    {
  
       
        $payment = new Payment();

        $payment->user_id = $id;
        $payment->amount = $request->amount;
        $payment->date = $request->date;
        $payment->note = $request->note;

        $save =  $payment->save();
        
        if ($save) {
            toast('Payment Added Successfully!', 'success');
            // Alert::success('Success!', 'Payment Added Successfully!');

            return redirect()->to(route('user.payment',['id'=>$id]));

        }

       
    }

    public function destroy($id,$payment_id)
    {

        if(Payment::destroy($payment_id))
        {
            toast('Payment Deleted Successfully!', 'error');
            // Alert::error('Deleted!', 'Payment Deleted Successfully!');

            return redirect()->to(route('user.payment',['id'=>$id]));


        }
    }

}
