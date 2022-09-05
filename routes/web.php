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




Route::get('create/groups',[UserGroupsController::class,'createGroup'])->name('create.groups');

Route::get('groups',[UserGroupsController::class,'index']);

Route::post('groups',[UserGroupsController::class,'storeGroup'])->name('created.groups');

Route::delete('groups/{id}',[UserGroupsController::class,'destroyGroup'])->name('destroy.groups');


//Resource Routing
Route::resource('users',UsersController::class);