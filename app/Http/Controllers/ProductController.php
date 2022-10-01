<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductEditRequest;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use App\Notifications\productNotification;
use Illuminate\Http\Request;
use Notification;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        Parent::__construct();
        $this->menu['main_menu'] = 'product';
        $this->menu['sub_menu'] = 'product';
        $this->menu['user'] = User::find(1);

        $this->menu['count']=  $this->menu['user']->unreadNotifications->count();
        
       
        
    }
    public function index()
    {
        $product = Product::all();
        return view('Products.product',['products'=>$product])->with($this->menu);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        return view('Products.create',['category'=>$category])->with($this->menu);;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $product = new Product();
        $product->title = $request->title;
        $product->description = $request->description;
        $product->cost_price = $request->cost_price;
        $product->price = $request->price;
        $product->unit = $request->unit;
        $product->category_id = $request->category_id;

        $user = User::all();

        if ($request->file('image')) {
            $file = $request->file('image')->store('Image', 'public');
            $product->image = $file;
        }

        $save = $product->save();

        if ($save) {
            toast('Product Created Successfully!', 'success');

            Notification::send($user, new productNotification($request->title));

            return redirect()->to(route('products.index'))->with($this->menu);
        }

        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      
        $product = Product::findorFail($id);
        $category = Category::all();
        return view('Products.show', ["products" => $product], $this->menu, ['category' => $category]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findorFail($id);
        $category = Category::all();

       
        return view('Products.edit',["products" => $product], ['category' => $category])
        ->with($this->menu);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductEditRequest $request, $id)
    {
        $id = $request->id;
        $product = Product::find($id);
        
        $product->title = $request->title;
        $product->description = $request->description;
        $product->cost_price = $request->cost_price;
        $product->price = $request->price;
        $product->unit = $request->unit;
        $product->category_id = $request->category_id;
  
        if ($request->hasFile('image')) {
            $des = 'public/' . $product->image;
            if (Storage::exists($des)) {
                // unlink($des);
                Storage::delete($des);
                // File::delete($des);

            }
            $products = $request->file('image')->store('Image', 'public');
            $product->image = $products;
        }

         $product->save();

      
         Alert::toast('Product Edited Successfully!', 'success');

            return redirect()->to(route('products.index'))->with($this->menu);
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);

        if ($product) {
            // File::delete($des);
            Storage::delete('public/' . $product->image);
            $product->delete();
            Session::flash('delete', 'Product deleted Successsfully');
        }

      return redirect(route('products.index'))->with($this->menu);;
    }
}
