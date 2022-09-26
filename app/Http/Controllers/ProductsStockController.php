<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductsStockController extends Controller
{
    public function index()
    {
        $product = Product::all();

        return view('Stocks.stock', ['products'=> $product]);
    }
}
