<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class UserPaymentsController extends Controller
{

    public function __construct()
    {
        $this->menu['main_menu'] = 'user';
        $this->menu['sub_menu'] = 'payment';
        
    }
   
    
    public function index($id)
    {
        $users = User::findorFail($id);
        $tab = 'payments';

        // dd($users->payments);

        return view('Users.payments.payments', ['users'=>$users])->with('tab',$tab)->with($this->menu);;

    }

    public function store(Request $request, $user_id, $invoice_id = null)
    {
  
        $payment = new Payment();

        $payment->user_id = $user_id;

        if ($invoice_id) {
            $payment->purchase_invoice_id = $invoice_id;
        }
        $payment->amount = $request->amount;
        $payment->date = $request->date;
        $payment->note = $request->note;

        $save =  $payment->save();
        
        if ($save) {
            toast('Payment Added Successfully!', 'success');
            // Alert::success('Success!', 'Payment Added Successfully!');

            if($invoice_id)
            {
                return redirect()->route('user.purchase.invoice_details', ['id' => $user_id,'invoice_id'=>$invoice_id])->with($this->menu);;
            }

            else
            {
                
                return redirect()->to(route('user.payment',['id'=>$user_id]))->with($this->menu);;
            }
 

          

        }

       
    }

    public function destroy($id,$payment_id)
    {

        if(Payment::destroy($payment_id))
        {
            toast('Payment Deleted Successfully!', 'error');
            // Alert::error('Deleted!', 'Payment Deleted Successfully!');

            return redirect()->to(route('user.payment',['id'=>$id]))->with($this->menu);;


        }
    }

}
