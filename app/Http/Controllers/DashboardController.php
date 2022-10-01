<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Product;
use App\Models\PurchaseItem;
use App\Models\Receipt;
use App\Models\SaleInvoice;
use App\Models\SaleItem;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{

    public $data = [];

    


    public function __construct()
    {
       
        $this->menu['main_menu'] = 'dashboard';
        $this->menu['sub_menu'] = 'dashboard';
        $this->menu['user'] = User::find(1);
        $this->menu['count']=  $this->menu['user']->unreadNotifications->count();
        
        
    }
    public function index()
    {
        $this->data['totalUsers'] = User::count('id');
        $this->data['totalProducts'] = Product::count('id');
        $this->data['totalSales'] = SaleItem::sum('total');
        $this->data['totalPurchases'] = PurchaseItem::sum('total');
        $this->data['totalReceipts'] = Receipt::sum('amount');
        $this->data['totalPayments'] = Payment::sum('amount');
        $this->data['totalStocks'] = PurchaseItem::sum('quantity') - SaleItem::sum('quantity');


    


        // $sale= SaleInvoice::whereBetween('date', [$start_date, $end_date])->get();

        $items = SaleInvoice::selectRaw('count(id) as total_sales, date')
                ->groupBy('date')
                ->get();
                
         
        // dd($items);

        $this->data['total_sales']=[];
        $this->data['date']=[];

        foreach ($items as $item) {
            $this->data['total_sales'][] = $item['total_sales'];
            $this->data['date'][] = $item['date'];
        }

        // $sales=[];
        // $date=[];

        // foreach ($items as $item) {
        //     $sales[] = $item['total_sales'];
        //     $date[]= $item['date'];

        // }

        return view('Dashboard.index', $this->menu, $this->data);

    }
}
