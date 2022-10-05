<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Payment;
use App\Models\Product;
use App\Models\PurchaseItem;
use App\Models\Receipt;
use App\Models\SaleItem;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{

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
    public function user()
    {

        $id = Auth::user()->id;
        $user = User::findorFail($id);
        
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

        return view('Dashboard.user',['users'=>$user])->with($this->menu)->with($this->data);

    }


    public function profile()
    {
        
        $id = Auth::user()->id;
        $user = User::findorFail($id);
        $group = Group::all();
        $tab = 'profile';
        return view('Profile.user', ["users" => $user], ['groups' => $group])->with('tab',$tab)->with($this->menu);
    }


    public function sales($id)
    {
        $id = Auth::user()->id;
        $users = User::findorFail($id);
        $tab = 'sales';
      


        return view('Customer.sales', ['users'=>$users])->with('tab',$tab)->with($this->menu);

    }

    
    public function purchases($id)
    {
        $id = Auth::user()->id;
        $users = User::findorFail($id);
        $tab = 'purchases';
      


        return view('Customer.purchases', ['users'=>$users])->with('tab',$tab)->with($this->menu);

    }


    public function payments($id)
    {
        $id = Auth::user()->id;
        $users = User::findorFail($id);
        $tab = 'payments';
      


        return view('Customer.payments', ['users'=>$users])->with('tab',$tab)->with($this->menu);

    }


    public function receipts($id)
    {
        $id = Auth::user()->id;
        $users = User::findorFail($id);
        $tab = 'receipts';
      


        return view('Customer.receipts', ['users'=>$users])->with('tab',$tab)->with($this->menu);

    }


}
