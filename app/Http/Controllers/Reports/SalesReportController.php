<?php

namespace App\Http\Controllers\Reports;

use App\Http\Controllers\Controller;
use App\Models\SaleInvoice;
use App\Models\SaleItem;
use Illuminate\Http\Request;

class SalesReportController extends Controller
{

    public function __construct()
    {
        $this->menu['main_menu'] = 'reports';
        $this->menu['sub_menu'] = 'Sales';
        
    }

 

    public function index(Request $request)
    {

        $start_date = $request->get('start_date',date('Y-m-d'));

        $end_date = $request->get('end_date',date('Y-m-d'));


        $sale= SaleInvoice::whereBetween('date', [$start_date, $end_date])->get();


        // dd($sale);

        return view('Reports.sales',  ['sales'=>$sale],$this->menu)
                                    ->with('start_date',$start_date)
                                    ->with('end_date',$end_date);
                                 
                             
    }
}
