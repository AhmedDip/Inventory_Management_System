<?php

namespace App\Http\Controllers\Reports;

use App\Http\Controllers\Controller;
use App\Models\PurchaseInvoice;
use App\Models\PurchaseItem;
use Illuminate\Http\Request;

class PurchasesReportController extends Controller
{
    public function index(Request $request)
    {

        $start_date = $request->get('start_date',date('Y-m-d'));

        $end_date = $request->get('end_date',date('Y-m-d'));

        $item = PurchaseItem::all();


        $purchase= PurchaseInvoice::whereBetween('date', [$start_date, $end_date])->get();


  

        return view('Reports.purchases', ['items'=>$item], ['purchases'=>$purchase])
                                    ->with('start_date',$start_date)
                                    ->with('end_date',$end_date);
                             
    }
}
