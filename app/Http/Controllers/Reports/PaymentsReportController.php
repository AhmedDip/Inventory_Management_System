<?php

namespace App\Http\Controllers\Reports;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;

class PaymentsReportController extends Controller
{
    public $menu = [];

    public function __construct()
    {
        Parent::__construct();
        $this->menu['main_menu'] = 'reports';
        $this->menu['sub_menu'] = 'Payments';
   
        $this->menu['user'] = User::find(1);
        $this->menu['count']=  $this->menu['user']->unreadNotifications->count();
    }


       

    public function index(Request $request)
    {

        $start_date = $request->get('start_date',date('Y-m-d'));

        $end_date = $request->get('end_date',date('Y-m-d'));

        // $item = PurchaseItem::all();


        $payment= Payment::whereBetween('date', [$start_date, $end_date])->get();



  

        return view('Reports.payments', ['payments'=>$payment])
                                    ->with('start_date',$start_date)
                                    ->with('end_date',$end_date)
                                    ->with($this->menu);
                             
    }
}
