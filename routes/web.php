<?php

use App\Http\Controllers\UserGroupsController;
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

Route::get('/', function () {
    return view('Layout/admin');
});


Route::get('/users',[UsersController::class,'index']);

Route::get('/groups',[UserGroupsController::class,'index']);

Route::get('create/groups',[UserGroupsController::class,'createGroup'])->name('create.groups');

Route::post('create/groups',[UserGroupsController::class,'storeGroup'])->name('create.groups');