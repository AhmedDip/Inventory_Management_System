<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class ProductsStockController extends Controller
{

    public function __construct()
    {
        $this->menu['main_menu'] = 'stock';
        $this->menu['sub_menu'] = 'p_stock';
        $this->menu['user'] = User::find(1);
        $this->menu['count']=  $this->menu['user']->unreadNotifications->count();
        
    }
    public function index()
    {
        $product = Product::all();

        return view('Stocks.stock', ['products'=> $product], $this->menu);
    }
}
