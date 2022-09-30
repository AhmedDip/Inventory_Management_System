<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function __construct()
        {
            $this->menu['main_menu'] = 'product';
            $this->menu['sub_menu'] = 'product';
            $this->menu['user'] = User::find(1);
            $this->menu['count']=  $this->menu['user']->unreadNotifications->count();
    
            
    }
    public function index()
    {
        $this->menu['user']->notifications()->delete();

        return redirect()->to(route('products.index'));
  }
}