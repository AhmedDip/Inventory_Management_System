<?php

namespace App\Http\Controllers;

use App\Models\Receipt;
use App\Models\User;
use Illuminate\Http\Request;

class UserReceiptsController extends Controller
{

    public function __construct()
    {
        $this->menu['main_menu'] = 'user';
        $this->menu['sub_menu'] = '';
        $this->menu['user'] = User::find(1);
        
    }
    public function index($id)
    {
       
        $users = User::findorFail($id);
        $tab = 'receipts';

        return view('Users.receipts.receipts', ['users'=>$users])->with('tab',$tab)->with($this->menu);

    }

    public function store(Request $request, $id, $invoice_id = null)
    {
  
       
        $receipt = new Receipt();

        $receipt->user_id = $id;

        if ($invoice_id) {
            $receipt->sale_invoice_id = $invoice_id;
        }
        $receipt->amount = $request->amount;
        $receipt->date = $request->date;
        $receipt->note = $request->note;

        $save =  $receipt->save();
        
        if ($save) {
            toast('Receipt Added Successfully!', 'success');
            // Alert::success('Success!', 'receipt Added Successfully!');

            if($invoice_id)
            {
                return redirect()->route('user.sales.invoice_details', ['id' => $id,'invoice_id'=>$invoice_id])->with($this->menu);;
            }

            else
            {
                
            return redirect()->to(route('user.receipt',['id'=>$id]))->with($this->menu);;
            }


        }

       
    }

    public function destroy($id,$receipt_id)
    {

        if(Receipt::destroy($receipt_id))
        {
            toast('Receipt Deleted Successfully!', 'error');
            // Alert::error('Deleted!', 'Receipt Deleted Successfully!');

            return redirect()->to(route('user.receipt',['id'=>$id]))->with($this->menu);;


        }
    }
}
