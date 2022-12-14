<?php

namespace App\Http\Controllers;

use App\Http\Requests\InvoiceProductRequest;
use App\Http\Requests\InvoiceRequest;
use App\Models\Product;
use App\Models\PurchaseInvoice;
use App\Models\PurchaseItem;
use App\Models\SaleItem;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class UserPurchasesController extends Controller
{

    public function __construct()
    {
        Parent::__construct();
        $this->menu['main_menu'] = 'user';
        $this->menu['sub_menu'] = 'purchase';
        $this->menu['user'] = User::find(1);
        $this->menu['count']=  $this->menu['user']->unreadNotifications->count();
        
    }
    public function index($id)
    {
    
        $users = User::findorFail($id);
        $tab = 'purchases';

        return view('Users.purchases.purchases', ['users'=>$users])->with('tab',$tab)    
                                                                                ->with($this->menu);

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
            return redirect()->route( 'user.purchase.invoice_details', ['id' => $id , 'invoice_id' => $purchase->id])    
            ->with($this->menu);

        }
    }


    public function invoice($user_id , $invoice_id)
    {
     
    

        $user = User::findOrFail($user_id );
        $invoice = PurchaseInvoice::findOrFail($invoice_id);
        $tab = 'purchases';
        $product = Product::all();

        return view('Users.purchases.invoice',['invoice'=>$invoice,'users'=>$user,'tab'=>$tab,'products'=>$product ])    
        ->with($this->menu);

    }


    public function generate_pdf($user_id , $invoice_id)
    {
        $users = User::findOrFail($user_id );
        $invoice = PurchaseInvoice::findOrFail($invoice_id);
        $tab = 'purchases';
        $product = Product::all();
        $data = 'Ahmed Rasidun Bari Dip';
        $pdf = Pdf::loadView('Users.purchases.invoice_pdf',['invoice'=>$invoice,'users'=>$users,'tab'=>$tab,'products'=>$product,'data'=>$data]);
        return $pdf->stream('Purchase Invoice Details',['invoice'=>$invoice,'users'=>$users,'tab'=>$tab,'products'=>$product]);
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

            return redirect()->to(route('user.purchase.invoice_details', ['id' => $user_id ,'invoice_id'=>$invoice_id]))    
            ->with($this->menu);

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

        return redirect()->route( 'user.purchase.invoice_details', ['id' => $user_id, 'invoice_id' => $invoice_id] )   
        ->with($this->menu);
    }
}
