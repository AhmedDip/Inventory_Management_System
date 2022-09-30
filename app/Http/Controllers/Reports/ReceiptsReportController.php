<?php

namespace App\Http\Controllers\Reports;

use App\Http\Controllers\Controller;
use App\Models\Receipt;
use App\Models\User;
use Illuminate\Http\Request;

class ReceiptsReportController extends Controller
{

    public $menu = [];

    public function __construct()
    {
        $this->menu['main_menu'] = 'reports';
        $this->menu['sub_menu'] = 'Receipts';
        $this->menu['user'] = User::find(1);
        
    }

    public function index(Request $request)
    {

        $start_date = $request->get('start_date',date('Y-m-d'));

        $end_date = $request->get('end_date',date('Y-m-d'));

        // $item = PurchaseItem::all();


        $receipt= Receipt::whereBetween('date', [$start_date, $end_date])->get();


  

        return view('Reports.receipts',  ['receipts'=>$receipt],$this->menu)
                                    ->with('start_date',$start_date)
                                    ->with('end_date',$end_date);
                             
    }
}
