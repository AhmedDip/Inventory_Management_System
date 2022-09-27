<?php

namespace App\Http\Controllers\Reports;

use App\Http\Controllers\Controller;
use App\Models\SaleInvoice;
use App\Models\SaleItem;
use Illuminate\Http\Request;

class SalesReportController extends Controller
{

    public $menu = [];

    public function __construct()
    {
        $this->menu['main_menu'] = 'reports';
        $this->menu['sub_menu'] = 'Sales';
        
    }

 

    public function index(Request $request)
    {

        $start_date = $request->get('start_date',date('Y-m-d'));

        $end_date = $request->get('end_date',date('Y-m-d'));


        // $sale= SaleInvoice::whereBetween('date', [$start_date, $end_date])->get();

        $item = SaleItem::select('sale_items.quantity','sale_items.price','sale_items.total','sale_invoices.date','products.title', 'products.image')
                ->join('products','sale_items.product_id', '=', 'products.id')
                ->join('sale_invoices','sale_items.sale_invoice_id', '=', 'sale_invoices.id')
                ->whereBetween('date', [$start_date, $end_date])
                ->get();

        
        // dd($item);

        return view('Reports.sales', ['items'=>$item])
                                    ->with('start_date',$start_date)
                                    ->with('end_date',$end_date)
                                    ->with($this->menu);
                                 
                             
    }
}
