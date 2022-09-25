<?php

namespace App\Http\Controllers;

use App\Http\Requests\InvoiceProductRequest;
use App\Http\Requests\InvoiceRequest;
use App\Models\Product;
use App\Models\PurchaseInvoice;
use App\Models\PurchaseItem;
use App\Models\SaleItem;
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


    public function createInvoice(Request $request, $id)
    {

  


        $purchase = new PurchaseInvoice();

        $purchase->user_id = $id;

        $purchase->invoice_no = $request->invoice_no;
        $purchase->date = $request->date;

        $save =  $purchase->save();
        
        if ($save) {
            toast('purchase Invoice Added Successfully!', 'success');
            // Alert::success('Success!', 'purchase Added Successfully!');
            return redirect()->route( 'user.purchase.invoice_details', ['id' => $id , 'invoice_id' => $purchase->id]);

        }
    }


    public function invoice($user_id , $invoice_id)
    {
     

        $user = User::findOrFail($user_id );
        $invoice = PurchaseInvoice::findOrFail($invoice_id);
        $tab = 'purchases';
        $product = Product::all();

        return view('Users.purchases.invoice',['invoice'=>$invoice,'users'=>$user,'tab'=>$tab,'products'=>$product ]);

    }

    public function addItem(InvoiceProductRequest $request, $user_id , $invoice_id)
    {

        // return $request->all();

        $purchase = new PurchaseItem();
        $purchase->purchase_invoice_id = $invoice_id;
        $purchase->product_id = $request->product_id;
        $purchase->quantity = $request->quantity;

        $purchase->price = $request->price;
        $purchase->total = $request->total;
    

        $save =  $purchase->save();
        
        if ($save) {
            toast('Item Added Successfully!', 'success');
            // Alert::success('Success!', 'sale Added Successfully!');

            return redirect()->to(route('user.purchase.invoice_details', ['id' => $user_id ,'invoice_id'=>$invoice_id]));

        }

    }

    public function destroy($user_id, $invoice_id)
    {
        if( PurchaseInvoice::destroy($invoice_id) ) {
            toast('Invoice Deleted Successfully!', 'error');  
        }

        return redirect()->route( 'user.purchase', ['id' => $user_id] );
    }

    public function destroyItem($user_id, $invoice_id, $item_id)
    {
        if( PurchaseItem::destroy( $item_id ) ) {
            toast('Item Deleted Successfully!', 'error');  
        }

        return redirect()->route( 'user.purchase.invoice_details', ['id' => $user_id, 'invoice_id' => $invoice_id] );
    }
}
