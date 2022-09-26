<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductsStockController extends Controller
{

    public function __construct()
    {
        $this->menu['main_menu'] = 'stock';
        $this->menu['sub_menu'] = 'p_stock';
        
    }
    public function index()
    {
        $product = Product::all();

        return view('Stocks.stock', ['products'=> $product], $this->menu);
    }
}
