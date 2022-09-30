<?php

namespace App\Http\Controllers\Reports;

use App\Http\Controllers\Controller;
use App\Models\PurchaseInvoice;
use App\Models\PurchaseItem;
use App\Models\User;
use Illuminate\Http\Request;

class PurchasesReportController extends Controller
{

    public $menu = [];

    public function __construct()
    {
        $this->menu['main_menu'] = 'reports';
        $this->menu['sub_menu'] = 'Purchases';
        $this->menu['user'] = User::find(1);
        $this->menu['count']=  $this->menu['user']->unreadNotifications->count();
        
    }
 


    public function index(Request $request)
    {

        $start_date = $request->get('start_date',date('Y-m-d'));

        $end_date = $request->get('end_date',date('Y-m-d'));


        // dd($item);
        $item = PurchaseItem::select('purchase_items.quantity','purchase_items.price','purchase_items.total','purchase_invoices.date','products.title', 'products.image')
        ->join('products','purchase_items.product_id', '=', 'products.id')
        ->join('purchase_invoices','purchase_items.purchase_invoice_id', '=', 'purchase_invoices.id')
        ->whereBetween('date', [$start_date, $end_date])
        ->get();

    


        return view('Reports.purchases', ['items'=>$item] )
                                    ->with('start_date',$start_date)
                                    ->with('end_date',$end_date)
                                    ->with($this->menu);
                                  
                             
    }
}
