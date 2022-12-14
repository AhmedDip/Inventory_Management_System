<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ProfileController;
use App\Http\Controllers\Auth\RegistrationController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductsStockController;
use App\Http\Controllers\Reports\PaymentsReportController;
use App\Http\Controllers\Reports\PurchasesReportController;
use App\Http\Controllers\Reports\ReceiptsReportController;
use App\Http\Controllers\Reports\SalesReportController;
use App\Http\Controllers\StrategicPartnerController;
use App\Http\Controllers\UserGroupsController;
use App\Http\Controllers\UserPaymentsController;
use App\Http\Controllers\UserProfileController;
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


Route::get('/',[LandingPageController::class,'index']);
Route::post('/',[LandingPageController::class,'mail']);
// Routes For Login
Route::get('login', [LoginController::class, 'login'])->name('login');
Route::post('login', [LoginController::class, 'authenticate'])->name('login.confirm');

Route::get('registration', [RegistrationController::class, 'index'])->name('registration');
Route::post('registration', [RegistrationController::class, 'register'])->name('registration.store');

Route::group(['middleware' => 'auth'], function () {

    Route::get('logout', [LoginController::class, 'logout'])->name('logout');
   

    Route::get('notification/clear',     [NotificationController::class, 'index'])->name('mark');

    Route::group(['middleware' => 'checkAdmin'], function () {

        Route::get('myprofile/{user}', [ProfileController::class, 'show'])->name('profile.show');

        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');



        //Pending User Requests

        Route::get('users/pending',     [UsersController::class, 'pending'])->name('pending');

        Route::get('users/status/{user_id}/{status_code}',     [UsersController::class, 'updateStatus'])->name('update.status');


        //Routes For Resource Routing
        Route::resource('users', UsersController::class);
        Route::resource('categories', CategoriesController::class);
        Route::resource('products', ProductController::class);
        Route::resource('partners', StrategicPartnerController::class);




        //Routes For User Groups
        Route::get('create/groups', [UserGroupsController::class, 'createGroup'])->name('create.groups');
        Route::get('groups', [UserGroupsController::class, 'index'])->name('groups');
        Route::post('groups', [UserGroupsController::class, 'storeGroup'])->name('created.groups');
        Route::delete('groups/{id}', [UserGroupsController::class, 'destroyGroup'])->name('destroy.groups');





        //Routes For User Sales 

        Route::get('/generate-pdf/{id}/invoices/{invoice_id}', [UserSalesController::class, 'generate_pdf'])->name('sales.invoice.pdf');
        Route::get('/download-pdf/{id}/invoices/{invoice_id}', [UserSalesController::class, 'download_pdf']);
        Route::get('users/{id}/sales',     [UserSalesController::class, 'index'])->name('user.sales');
        Route::post('users/{id}/invoices',    [UserSalesController::class, 'createInvoice'])->name('user.sales.store');
        Route::get('users/{id}/invoices/{invoice_id}',    [UserSalesController::class, 'invoice'])->name('user.sales.invoice_details');
        Route::delete('users/{id}/invoices/{invoice_id}', [UserSalesController::class, 'destroy'])->name('user.sales.destroy');
        Route::post('users/{id}/invoices/{invoice_id}',    [UserSalesController::class, 'addItem'])->name('user.sales.invoices.add_item');
        Route::delete('users/{id}/invoices/{invoice_id}/{item_id}', [UserSalesController::class, 'destroyItem'])->name('user.sales.invoices.delete_item');

        // Route::get('/download-pdf',[PdfController::class,'download_pdf']);



        // Routes For Purchase
        Route::get('users/{id}/purchases', [UserPurchasesController::class, 'index'])->name('user.purchase');
        Route::post('users/{id}/purchases',    [UserPurchasesController::class, 'createInvoice'])->name('user.purchase.store');
        Route::get('/generate-pdf/{id}/purchases/{invoice_id}', [UserPurchasesController::class, 'generate_pdf'])->name('purchases.invoice.pdf');
        Route::get('users/{id}/purchases/{invoice_id}',    [UserPurchasesController::class, 'invoice'])->name('user.purchase.invoice_details');
        Route::delete('users/{id}/purchases/{invoice_id}', [UserPurchasesController::class, 'destroy'])->name('user.purchase.destroy');
        Route::post('users/{id}/purchases/{invoice_id}',    [UserPurchasesController::class, 'addItem'])->name('user.purchase.add_item');
        Route::delete('users/{id}/purchases/{invoice_id}/{item_id}', [UserPurchasesController::class, 'destroyItem'])->name('user.purchase.delete_item');



        // Routes For Payments
        Route::get('users/{id}/payments', [UserPaymentsController::class, 'index'])->name('user.payment');
        Route::post('users/{id}/payments/{invoice_id?}', [UserPaymentsController::class, 'store'])->name('user.payment.store');
        Route::delete('users/{id}/payments/{payment_id}', [UserPaymentsController::class, 'destroy'])->name('user.payment.destroy');



        // Routes For Receipts
        Route::get('users/{id}/receipts', [UserReceiptsController::class, 'index'])->name('user.receipt');
        Route::post('users/{id}/receipts/{invoice_id?}', [UserReceiptsController::class, 'store'])->name('user.receipt.store');

        Route::delete('users/{id}/receipts/{payment_id}', [UserReceiptsController::class, 'destroy'])->name('user.receipt.destroy');



        // Routes For Stocks
        Route::get('stocks', [ProductsStockController::class, 'index'])->name('stocks');


        // Routes For Reports
        Route::get('reports/sales', [SalesReportController::class, 'index'])->name('reports.sales');
        Route::get('reports/purchases', [PurchasesReportController::class, 'index'])->name('reports.purchases');
        Route::get('reports/payments', [PaymentsReportController::class, 'index'])->name('reports.payments');
        Route::get('reports/receipts', [ReceiptsReportController::class, 'index'])->name('reports.receipts');
    });

    Route::group(['middleware' => 'checkUser'], function () {

        Route::get('dashboard/user', [CustomerController::class, 'user'])->name('user.dashboard');

        Route::get('profile/{user}', [CustomerController::class, 'profile'])->name('user.profile');

        Route::get('profile/{id}/purchases',     [CustomerController::class, 'sales'])->name('profile.sales');

        Route::get('profile/{id}/sales',     [CustomerController::class, 'purchases'])->name('profile.purchases');

        Route::get('profile/{id}/receipts',     [CustomerController::class, 'payments'])->name('profile.payments');

        Route::get('profile/{id}/payments',     [CustomerController::class, 'receipts'])->name('profile.receipts');
    });
});
