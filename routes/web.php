<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use phpseclib3\Net\SSH2;

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

Auth::routes(['verify' => true]);

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('logout', 'Auth\LogoutController@logout');

// Test route
Route::get('/test', function() {
    //
});

/**
 * Backoffice
*/
Route::middleware(['auth', 'verified', 'setRouter'])->prefix('backoffice')->name('backoffice.')->group(function() {

    Route::get('/', 'Backoffice\DashboardController@index')->name('dashboard');

    Route::prefix('subscriptions')->name('subscriptions.')->group(function() {
        // Customers
        Route::resource('customers', 'Backoffice\CustomersController');
        Route::get('archived-test', 'Backoffice\CustomersController@archived')->name('archived-test');
        Route::delete('customers/{customer}/remove-account', 'Backoffice\CustomersController@removeAccount')->name('customers.remove-account');
    
        // Subscriptions
        Route::resource('subscriptions', 'Backoffice\SubscriptionsController');

        // Transactions
        Route::resource('transactions', 'Backoffice\TransactionsController');

        // Billings
        Route::post('billings/activate', 'Backoffice\BillingsController@activate')->name('billings.activate');
        Route::patch('billings/{billing}/deactivate', 'Backoffice\BillingsController@deactivate')->name('billings.deactivate');
        Route::patch('billings/{billing}/reactivate', 'Backoffice\BillingsController@reactivate')->name('billings.reactivate');
    });
    
    
    // Products
    Route::resource('products', 'Backoffice\ProductsController');

    // Policy & Conditions
    Route::resource('policy', 'Backoffice\PolicyController');

    // Hotspot
    Route::prefix('hotspot-wifi')->name('hotspot-wifi.')->group(function() {
        // Vouchers
        Route::resource('vouchers', 'Backoffice\VouchersController');

        // Piso Rates
        Route::resource('rates', 'Backoffice\RatesController');
    });

    // Transactions
    Route::prefix('transactions')->name('transactions.')->group(function() {
        // Payments
        Route::get('payments', 'Backoffice\TransactionsController@payments')->name('payments.index');
        Route::get('charges', 'Backoffice\TransactionsController@charges')->name('charges.index');

        // Expenses
        Route::resource('expenses', 'Backoffice\ExpensesController');
    });

    // Support Tickets
    Route::resource('tickets', 'Backoffice\TicketsController');

    // Routers
    Route::resource('routers', 'Backoffice\RoutersController');

    // PON Management
    Route::resource('olt-devices', 'Backoffice\OltDevicesController');
    Route::resource('nap-devices', 'Backoffice\NapDevicesController');
    Route::get('olt-devices/{oltDevice}/nap-devices/{napDevice}', 'Backoffice\OltDevicesController@nap')->name('olt-devices.nap-device');

    // Roles
    Route::resource('roles', 'Backoffice\RolesController');

    // Permissions
    Route::resource('permissions', 'Backoffice\PermissionsController');
    Route::post('permissions/store-module', 'Backoffice\PermissionsController@storeModule')->name('permissions.store-module');
});

/**
 * API
*/
Route::middleware(['auth'])->prefix('api')->group(function() {
    // Dashboard
    Route::post('dashboard/router', 'Api\DashboardController@router')->name('api.dashboard.active-router');

    // Customers Record
    Route::get('customers/data', 'Api\CustomersController@data')->name('api.customers.data');
    Route::get('customers/archived', 'Api\CustomersController@archived')->name('api.customers.archived');

    // Products
    Route::get('products/data', 'Api\ProductsController@data')->name('api.products.data');
    Route::get('products/price', 'Api\ProductsController@price')->name('api.products.price');

    // Policy
    Route::get('policy/data', 'Api\PolicyController@data')->name('api.policy.data');

    // Hotspot - Vouchers
    Route::get('vouchers/data', 'Api\VouchersController@data')->name('api.vouchers.data');

    // Payments
    Route::get('transactions/payments', 'Api\TransactionsController@payments')->name('api.transactions.payments');

    // Charges
    Route::get('transactions/charges', 'Api\TransactionsController@charges')->name('api.transactions.charges');

    // Expenses
    Route::get('expenses/data', 'Api\ExpensesController@data')->name('api.expenses.data');

    // Support Tickets
    Route::get('tickets/data', 'Api\TicketsController@data')->name('api.tickets.data');

    // OLT Devices
    Route::get('olt-devices/data', 'Api\OltDevicesController@data')->name('api.olt-devices.data');
    Route::get('olt-devices/ports', 'Api\OltDevicesController@port')->name('api.olt-devices.ports');
    Route::get('olt-devices/naps', 'Api\OltDevicesController@nap')->name('api.olt-devices.naps');

    // Roles
    Route::get('roles/data', 'Api\RolesController@data')->name('api.roles.data');

    // Permissions
    Route::get('permissions/data', 'Api\PermissionsController@data')->name('api.permissions.data');

    Route::post('records/olt-device', 'Api\SubscriptionsController@oltDevice')->name('api.subscriptions.olt-device');
    Route::post('records/pon-port', 'Api\SubscriptionsController@ponPort')->name('api.subscriptions.pon-port');
    Route::post('records/nap-device', 'Api\SubscriptionsController@napDevice')->name('api.subscriptions.nap-device');
});