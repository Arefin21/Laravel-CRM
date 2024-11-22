<?php

use App\Http\Controllers\Auth\SocialController;
use App\Http\Controllers\SupportAdmin\SupportadminController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;

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

// Route::get('/auth/redirect',function(){
//     return Socialite::driver('google')->redirect();
// });

Route::get('/login/google', [SocialController::class, 'redirectToGoogle'])->name('login.google');
Route::get('/login/google/callback', [SocialController::class, 'handleGoogleCallback']);
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
    Route::resource('admin/service', \App\Http\Controllers\Superadmin\WarehouseController::class);
    Route::resource('admin/unit', \App\Http\Controllers\Superadmin\UnitController::class);
    Route::resource('admin/purchasecompany', \App\Http\Controllers\Superadmin\PurchaseCompanyController::class);
    Route::resource('admin/category', \App\Http\Controllers\Superadmin\CategoryController::class);
    Route::resource('admin/product', \App\Http\Controllers\Superadmin\ProductController::class);
    Route::resource('admin/companyproduct', \App\Http\Controllers\Superadmin\CompanyProductController::class);

    // Stock Routes
    Route::post('/stock/add', [\App\Http\Controllers\Superadmin\StockController::class, 'store'])->name('stock.add');
    Route::post('/companystock/add', [\App\Http\Controllers\Superadmin\CompanyStockController::class, 'store'])->name('companystock.add');

    // SR Management
    Route::get('admin/admin-add', [App\Http\Controllers\Superadmin\SuperadminController::class, 'sr_add'])->name('sradd.settings');
    Route::post('admin/srregistration', [App\Http\Controllers\Superadmin\SuperadminController::class, 'sr_registration'])->name('sr.registration');
    Route::get('admin/all-admin', [App\Http\Controllers\Superadmin\SuperadminController::class, 'srlist'])->name('sr.list');

    Route::get('admin/support-admin', [App\Http\Controllers\Superadmin\SuperadminController::class, 'supportAdmin'])->name('supportadmin.leads.index');
    Route::get('admin/support/edit/{id}', [App\Http\Controllers\Superadmin\SuperadminController::class, 'supportAdminedit'])->name('supportadmin.edit');
    Route::post('admin/support/update/{id}', [App\Http\Controllers\Superadmin\SuperadminController::class, 'supportAdminupdate'])->name('supportadmin.update');

    Route::get('admin/admin/edit/{id}', [App\Http\Controllers\Superadmin\SuperadminController::class, 'sredit'])->name('sr.edit');
    Route::post('admin/sr/update/{id}', [App\Http\Controllers\Superadmin\SuperadminController::class, 'srupdate'])->name('sr.update');
    Route::delete('admin/sr/delete/{id}', [App\Http\Controllers\Superadmin\SuperadminController::class, 'srdelete'])->name('sr.delete');

    // Order Management
    Route::get('admin/order/all', [\App\Http\Controllers\OrderController::class, 'admin_index'])->name('admin.all_order');
    // Route::get('admin/sr/shop/{id}', [\App\Http\Controllers\Superadmin\SuperadminController::class, 'signle_sr'])->name('admin.single.shop');
    Route::get('admin/subadmin/{id}', [\App\Http\Controllers\Superadmin\SuperadminController::class, 'signle_admin'])->name('single.admin');
    Route::get('admin/client/details/{id}', [\App\Http\Controllers\OrderController::class, 'orderlist_byshopadmin'])->name('super.list.shop');
    Route::get('admin/order/success/{id}', [\App\Http\Controllers\OrderController::class, 'admin_success'])->name('admin.order.success');
    Route::get('admin/order/print/{id}', [\App\Http\Controllers\OrderController::class, 'admin_success_print'])->name('admin.order.print');
    // Payment Management
    Route::post('admin/payments/store', [\App\Http\Controllers\Superadmin\PaymentController::class, 'store'])->name('payment.store');

    // Opening Ballance
    Route::post('admin/opening/ballance', [\App\Http\Controllers\Superadmin\PaymentController::class, 'opening_ballance'])->name('opneing.ballance');

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

    // Car Rent Management
    Route::resource('admin/driver', \App\Http\Controllers\Superadmin\Driver\DriverController::class);
    Route::resource('admin/route', \App\Http\Controllers\Superadmin\Driver\RouteController::class);
    Route::resource('admin/trip', \App\Http\Controllers\Superadmin\Driver\TripController::class);

    // Credit Ballance
    Route::post('admin/credit/ballance', [\App\Http\Controllers\Superadmin\PaymentController::class, 'credit_ballance'])->name('credit.ballance');
    Route::post('admin/debit/store', [\App\Http\Controllers\Superadmin\PaymentController::class, 'debit_store'])->name('debit.store');
    Route::get('admin/payment/company/{id}', [\App\Http\Controllers\Superadmin\PaymentController::class, 'company_payement_details'])->name('super.payment.company');
    //Route::resource('admin/leads', \App\Http\Controllers\Superadmin\LeadController::class);
    Route::resource('admin/leads', \App\Http\Controllers\Superadmin\LeadController::class)
        ->names([
            'index'   => 'admin.leads.index',
            'create'  => 'admin.leads.create',
            'store'   => 'admin.leads.store',
            'show'    => 'admin.leads.show',
            'edit'    => 'admin.leads.edit',
            'update'  => 'admin.leads.update',
            'destroy' => 'admin.leads.destroy',
        ]);
    Route::resource('statuses', \App\Http\Controllers\Superadmin\StatusController::class);

    Route::get('admin/recent-issue', [\App\Http\Controllers\Superadmin\TestController::class, 'test'])->name('test.route');

    //Route::get('leads/{leadId}/comments', [\App\Http\Controllers\Superadmin\SuperadminController::class, 'showComments'])->name('comments.view');
    Route::get('admin/comments/{leadId}', [App\Http\Controllers\Superadmin\SuperadminController::class, 'showComments'])->name('admin.comment.show');
    //Route::get('admin/leads/today', [\App\Http\Controllers\Superadmin\LeadController::class, 'getTodayLeads'])->name('recent.list');
    //Route::get('admin/leads/recent', [App\Http\Controllers\Superadmin\PaymentController::class, 'getTodayLeads'])->name('recent.list');

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

    Route::get('subadmin/client/details/{id}', [\App\Http\Controllers\OrderController::class, 'orderlist_byshop'])->name('order.list.shop');

    Route::get('subadmin/report/totalsale', [\App\Http\Controllers\ReportController::class, 'totalsale'])->name('sub.total.sale');
    Route::get('subadmin/report/totalcollection', [\App\Http\Controllers\ReportController::class, 'subtotalcollection'])->name('sub.total.collection');
    Route::get('subadmin/report/totaldue', [\App\Http\Controllers\ReportController::class, 'subtotaldue'])->name('sub.total.due');

    Route::get('subadmin/payment/shop/{id}', [\App\Http\Controllers\Superadmin\PaymentController::class, 'sub_payement_details'])->name('subadmin.payment.shop');
    Route::get('subadmin/order/print/{id}', [\App\Http\Controllers\OrderController::class, 'subadmin_success_print'])->name('subadmin.order.print');
    //Route::resource('subadmin/leads', \App\Http\Controllers\Subadmin\AdminLeadController::class);

    Route::resource('subadmin/leads', \App\Http\Controllers\Subadmin\AdminLeadController::class)->names([
        'index'   => 'subadmin.leads.index',
        'create'  => 'subadmin.leads.create',
        'store'   => 'subadmin.leads.store',
        'show'    => 'subadmin.leads.show',
        'edit'    => 'subadmin.leads.edit',
        'update'  => 'subadmin.leads.update',
        'destroy' => 'subadmin.leads.destroy',
    ]);

    Route::get('subadmin/comments/add/{leadId}', [App\Http\Controllers\Subadmin\SubadminController::class, 'createComment'])->name('subadmin.comment.add');

    Route::post('subadmin/comments/add/{leadId}', [App\Http\Controllers\Subadmin\SubadminController::class, 'addComment'])->name('subadmin.comment.store');
    Route::get('subadmin/comments/{leadId}', [App\Http\Controllers\Subadmin\SubadminController::class, 'showComments'])->name('subadmin.comment.show');

// Route::put('comments/{commentId}', [App\Http\Controllers\Subadmin\SubadminController::class, 'updateComment'])->name('comments.update');
    Route::get('subadmin/lead/{id}', [\App\Http\Controllers\Subadmin\SubadminController::class, 'signleLeadView'])->name('single.lead');

});

// Route::get('test-route', [TestController::class, 'test'])->name('test.route');

Route::group(['middleware' => 'is_support'], function () {
    Route::get('admin/support', [SupportadminController::class, 'dashboard'])->name('admin.support');

    Route::resource('support/leads', \App\Http\Controllers\SupportAdmin\AdminLeadController::class)->names([
        'index'   => 'support.leads.index',
        'create'  => 'support.leads.create',
        'store'   => 'support.leads.store',
        'show'    => 'support.leads.show',
        'edit'    => 'support.leads.edit',
        'update'  => 'support.leads.update',
        'destroy' => 'support.leads.destroy',
    ]);
    Route::get('supportadmin/client/details/{id}', [\App\Http\Controllers\SupportAdmin\AdminLeadController::class, 'Details'])->name('supportadmin.client.details');

    Route::get('supportadmin/comments/add/{leadId}', [App\Http\Controllers\SupportAdmin\AdminLeadController::class, 'createComment'])->name('supportadmin.comment.add');

    Route::post('supportadmin/comments/add/{leadId}', [App\Http\Controllers\SupportAdmin\AdminLeadController::class, 'addComment'])->name('supportadmin.comment.store');
    Route::get('supportadmin/comments/{leadId}', [App\Http\Controllers\SupportAdmin\AdminLeadController::class, 'showComments'])->name('supportadmin.comment.show');

});