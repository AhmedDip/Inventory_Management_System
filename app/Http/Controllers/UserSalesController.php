<?php

namespace App\Http\Controllers;

use App\Http\Requests\InvoiceProductRequest;
use App\Http\Requests\InvoiceRequest;
use App\Models\Product;
use App\Models\SaleInvoice;
use App\Models\SaleItem;
use App\Models\User;
use Illuminate\Http\Request;

class UserSalesController extends Controller
{

    public function __construct()
    {
        $this->menu['main_menu'] = 'user';
        $this->menu['sub_menu'] = '';
        $this->menu['user'] = User::find(1);
        $this->menu['count']=  $this->menu['user']->unreadNotifications->count();
        
    }  
    
    public function index($id)
    {
        $users = User::findorFail($id);
        $tab = 'sales';
      


        return view('Users.sales.sales', ['users'=>$users])->with('tab',$tab)->with($this->menu);

    }

    public function createInvoice(InvoiceRequest $request, $id)
    {

        $sale = new SaleInvoice();
      
        $sale->user_id = $id;
        $sale->invoice_no = $request->invoice_no;
        $sale->date = $request->date;

        $save =  $sale->save();
        
        if ($save) {
            toast('Sale Invoice Added Successfully!', 'success');
            // Alert::success('Success!', 'sale Added Successfully!');

            return redirect()->to(route('user.sales',['id'=>$id], $this->menu));

        }
    }


    public function invoice($user_id , $invoice_id)
    {
      

        $user = User::findOrFail($user_id );
        $invoice = SaleInvoice::findOrFail($invoice_id);
        $tab = 'sales';
        $product = Product::all();

        return view('Users.sales.invoice',['invoice'=>$invoice,'users'=>$user,'tab'=>$tab,'products'=>$product])->with($this->menu);

    }

    public function addItem(InvoiceProductRequest $request, $user_id , $invoice_id)
    {
      

        // return $request->all();

        $sale = new SaleItem();
        $sale->sale_invoice_id = $invoice_id;
        $sale->product_id = $request->product_id;
        $sale->quantity = $request->quantity;

        $sale->price = $request->price;
        $sale->total = $request->total;
    

        $save =  $sale->save();
        
        if ($save) {
            toast('Item Added Successfully!', 'success');
            // Alert::success('Success!', 'sale Added Successfully!');

            return redirect()->to(route('user.sales.invoice_details', ['id' => $user_id ,'invoice_id'=>$sale->sale_invoice_id]))->with($this->menu);

        }

    }

    public function destroy($user_id, $invoice_id)
    {
      
        if( SaleInvoice::destroy($invoice_id) ) {
            toast('Invoice Deleted Successfully!', 'error');  
        }

        return redirect()->route( 'user.sales', ['id' => $user_id])->with($this->menu);
    }

    public function destroyItem($user_id, $invoice_id, $item_id)
    {
      
        if( SaleItem::destroy( $item_id ) ) {
            toast('Item Deleted Successfully!', 'error');  
        }

        return redirect()->route( 'user.sales.invoice_details', ['id' => $user_id, 'invoice_id' => $invoice_id] )->with($this->menu);;
    }
}
