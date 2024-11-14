<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\Auth\RegisterController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

/*
|--------------------------------------------------------------------------
| Subscriber Signin Part
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return Auth::check() ? Redirect::to('home') : view('auth.login');
});
Route::get('/signin', [App\Http\Controllers\Superadmin\SuperadminController::class, 'Signin'])->name('signin');

Auth::routes();


/*
|--------------------------------------------------------------------------
| Subscriber Routes
|--------------------------------------------------------------------------
*/

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

});

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::group(['middleware' => 'is_admin'], function () {
    // Admin Dashboard
    Route::get('admin/home', [App\Http\Controllers\Superadmin\SuperadminController::class, 'dashboard'])->name('admin.home');

    // Resourceful Routes
    Route::resource('admin/warehouse', \App\Http\Controllers\Superadmin\WarehouseController::class);
    Route::resource('admin/unit', \App\Http\Controllers\Superadmin\UnitController::class);
    Route::resource('admin/purchasecompany', \App\Http\Controllers\Superadmin\PurchaseCompanyController::class);
    Route::resource('admin/category', \App\Http\Controllers\Superadmin\CategoryController::class);
    Route::resource('admin/product', \App\Http\Controllers\Superadmin\ProductController::class);
    Route::resource('admin/companyproduct', \App\Http\Controllers\Superadmin\CompanyProductController::class);

    // Stock Routes
    Route::post('/stock/add', [\App\Http\Controllers\Superadmin\StockController::class, 'store'])->name('stock.add');
    Route::post('/companystock/add', [\App\Http\Controllers\Superadmin\CompanyStockController::class, 'store'])->name('companystock.add');

    // SR Management
    Route::get('admin/sradd', [App\Http\Controllers\Superadmin\SuperadminController::class, 'sr_add'])->name('sradd.settings');
    Route::post('admin/srregistration', [App\Http\Controllers\Superadmin\SuperadminController::class, 'sr_registration'])->name('sr.registration');
    Route::get('admin/srlist', [App\Http\Controllers\Superadmin\SuperadminController::class, 'srlist'])->name('sr.list');
    Route::get('admin/sr/edit/{id}', [App\Http\Controllers\Superadmin\SuperadminController::class, 'sredit'])->name('sr.edit');
    Route::post('admin/sr/update/{id}', [App\Http\Controllers\Superadmin\SuperadminController::class, 'srupdate'])->name('sr.update');
    Route::delete('admin/sr/delete/{id}', [App\Http\Controllers\Superadmin\SuperadminController::class, 'srdelete'])->name('sr.delete');

    // Order Management
    Route::get('admin/order/all', [\App\Http\Controllers\OrderController::class, 'admin_index'])->name('admin.all_order');
    Route::get('admin/sr/shop/{id}', [\App\Http\Controllers\Superadmin\SuperadminController::class, 'signle_sr'])->name('admin.single.shop');
    Route::get('admin/order/shop/{id}', [\App\Http\Controllers\OrderController::class, 'orderlist_byshopadmin'])->name('super.list.shop');
    Route::get('admin/order/success/{id}', [\App\Http\Controllers\OrderController::class, 'admin_success'])->name('admin.order.success');
    // Payment Management
    Route::post('admin/payments/store', [\App\Http\Controllers\Superadmin\PaymentController::class, 'store'])->name('payment.store');
    Route::get('admin/payment/shop/{id}', [\App\Http\Controllers\Superadmin\PaymentController::class, 'payement_details'])->name('super.payment.shop');

    // Report Management
    Route::get('admin/report/totalsale', [\App\Http\Controllers\ReportController::class, 'totalsale'])->name('super.total.sale');
    Route::get('admin/report/totalcollection', [\App\Http\Controllers\ReportController::class, 'totalcollection'])->name('super.total.collection');
    Route::get('admin/report/totaldue', [\App\Http\Controllers\ReportController::class, 'totaldue'])->name('super.total.due');
    
      // Income Expense Management
    Route::resource('admin/income', \App\Http\Controllers\Superadmin\IncomeExpense\IncomeController::class);
    Route::resource('admin/expense', \App\Http\Controllers\Superadmin\IncomeExpense\ExpenseController::class);
    // Filter Management
    Route::get('admin/filter-transactions', [\App\Http\Controllers\Superadmin\IncomeExpense\IncomeController::class, 'filterTransactions'])->name('filter.transactions');


});

/*
|--------------------------------------------------------------------------
| Moderator Routes
|--------------------------------------------------------------------------
*/

Route::group(['middleware' => 'is_moderator'], function () {
    Route::get('subadmin/home', [App\Http\Controllers\Subadmin\SubadminController::class, 'dashboard'])->name('subadmin.home');
    Route::get('subadmin/warehouse/show/{id}', [App\Http\Controllers\Subadmin\SubadminController::class, 'warhouselilst'])->name('warehouse.sr.show');
    Route::resource('sr/shop', \App\Http\Controllers\Subadmin\SrshopController::class);
    Route::get('subadmin/sr/category', [App\Http\Controllers\Subadmin\SubadminController::class, 'srcategory'])->name('sr.category');
    Route::get('subadmin/cat/product/{id}', [App\Http\Controllers\Subadmin\SubadminController::class, 'cate_pro'])->name('sr.category.product');
    Route::get('subadmin/cat/product/single/{id}', [App\Http\Controllers\Subadmin\SubadminController::class, 'cate_pro_single'])->name('cat.prod.single');
    Route::post('subadmin/add-to-cart', [App\Http\Controllers\Subadmin\SubadminController::class, 'addToCart']);
    Route::get('subadmin/cart', [App\Http\Controllers\Subadmin\SubadminController::class, 'viewCart'])->name('cart.view');
    Route::post('subadmin/remove-from-cart', [App\Http\Controllers\Subadmin\SubadminController::class, 'removeFromCart'])->name('remove.from.cart');
    Route::post('subadmin/order', [App\Http\Controllers\OrderController::class, 'store'])->name('order.store');
    Route::get('subadmin/order/success/{id}', [\App\Http\Controllers\OrderController::class, 'success'])->name('order.success');
    Route::get('subadmin/order/all', [\App\Http\Controllers\OrderController::class, 'index'])->name('sr.all_order');
    Route::get('subadmin/order/shop/{id}', [\App\Http\Controllers\OrderController::class, 'orderlist_byshop'])->name('order.list.shop');
    Route::get('subadmin/report/totalsale', [\App\Http\Controllers\ReportController::class, 'totalsale'])->name('sub.total.sale');
    Route::get('subadmin/report/totalcollection', [\App\Http\Controllers\ReportController::class, 'subtotalcollection'])->name('sub.total.collection');
    Route::get('subadmin/report/totaldue', [\App\Http\Controllers\ReportController::class, 'subtotaldue'])->name('sub.total.due');
});

