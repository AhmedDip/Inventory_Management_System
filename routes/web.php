<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserGroupsController;
use App\Http\Controllers\UserPaymentsController;
use App\Http\Controllers\UserPurchasesController;
use App\Http\Controllers\UserReceiptsController;
use App\Http\Controllers\UserSalesController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('login',[LoginController::class,'login'])->name('login');
Route::post('login',[LoginController::class,'authenticate'])->name('login.confirm');

Route::group(['middleware'=>'auth'],function()
{

Route::get('/', function () {
    return view('Layout/admin');
});

Route::get('logout',[LoginController::class,'logout'])->name('logout');


//Resource Routing
Route::resource('users',UsersController::class); 
Route::resource('categories',CategoriesController::class);
Route::resource('products',ProductController::class);


//User Groups

Route::get('create/groups',[UserGroupsController::class,'createGroup'])->name('create.groups');
Route::get('groups',[UserGroupsController::class,'index']);
Route::post('groups',[UserGroupsController::class,'storeGroup'])->name('created.groups');
Route::delete('groups/{id}',[UserGroupsController::class,'destroyGroup'])->name('destroy.groups');


// User Sales 

Route::get('users/{id}/sales',[UserSalesController::class,'index'])->name('user.sale');
Route::get('users/{id}/purchases',[UserPurchasesController::class,'index'])->name('user.purchase');
Route::get('users/{id}/payments',[UserPaymentsController::class,'index'])->name('user.payment');
Route::get('users/{id}/receipts',[UserReceiptsController::class,'index'])->name('user.receipt');


});


