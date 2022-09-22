<?php

namespace App\Http\Controllers;

use App\Models\Receipt;
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

    public function store(Request $request, $id)
    {
  
       
        $receipt = new Receipt();

        $receipt->user_id = $id;
        $receipt->amount = $request->amount;
        $receipt->date = $request->date;
        $receipt->note = $request->note;

        $save =  $receipt->save();
        
        if ($save) {
            toast('Receipt Added Successfully!', 'success');
            // Alert::success('Success!', 'receipt Added Successfully!');

            return redirect()->to(route('user.receipt',['id'=>$id]));

        }

       
    }

    public function destroy($id,$receipt_id)
    {

        if(Receipt::destroy($receipt_id))
        {
            toast('receipt Deleted Successfully!', 'error');
            // Alert::error('Deleted!', 'Receipt Deleted Successfully!');

            return redirect()->to(route('user.receipt',['id'=>$id]));


        }
    }
}
