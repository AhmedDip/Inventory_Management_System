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
use Illuminate\Support\Facades\Auth;
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
        $this->data['total_sales']=[];
        $this->data['date']=[];
        $this->data['total']=[];
        $this->data['status']=[];      

        
        
    }
    public function index()
    {
        $this->data['totalUsers'] = User::count('id');
        $this->data['totalAdmin'] = User::where('group_id', '=', '1')->count('id');
        $this->data['ActiveUsers'] = User::where('status', '=', '1')->count('id');
        $this->data['PendingUsers'] = User::where('status', '=', '2')->count('id');
        $this->data['SuspendUsers'] = User::where('status', '=', '0')->count('id');
        $this->data['totalProducts'] = Product::count('id');
        $this->data['totalSales'] = SaleItem::sum('total');
        $this->data['totalPurchases'] = PurchaseItem::sum('total');
        $this->data['totalReceipts'] = Receipt::sum('amount');
        $this->data['totalPayments'] = Payment::sum('amount');
        $this->data['totalStocks'] = PurchaseItem::sum('quantity') - SaleItem::sum('quantity');


    


        // $sale= SaleInvoice::whereBetween('date', [$start_date, $end_date])->get();

        // $items = SaleInvoice::selectRaw('count(id) as total_sales, DATE_FORMAT(date, "%d-%M-%Y") as date')
        //         ->groupBy('date')
        //         ->get();


        
        $items = SaleItem::selectRaw('sum(sale_items.quantity) as total_sales, DATE_FORMAT(sale_invoices.date, "%d-%M-%Y") as date')
        ->join('sale_invoices','sale_items.sale_invoice_id', '=', 'sale_invoices.id')
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

        $users_status = User::selectRaw('count(id) as total , status')
                                    ->groupBy('status')
                                    ->get();

        $this->data['total']=[];
        $this->data['status']=[];                           

          foreach ($users_status as $users_status)
           {
                $this->data['total'][] = $users_status['total'];
                $this->data['status'][] = $users_status['status'];
           }

        return view('Dashboard.index', $this->menu, $this->data);

    }


    
}
