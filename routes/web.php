<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CashierController;
use App\Http\Controllers\MReaderController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Auth::routes();

Route::group(['middleware' => 'auth'], function () {

    // Route::controller(CashierController::class)->group(function () {
    //     Route::get('/', 'cashierHomepage')->name('home');
    //     Route::get('/payment', 'cashierPayments')->name('payment-home');
    //     Route::get('/payment/customer-bill', 'cashierCustomerBill')->name('customer-bill');
    //     Route::get('/payment/genarate-bill', 'cashierGenarateBill')->name('genarate-bill');
    //     Route::get('/payment/paybill', 'cashierPay')->name('paybill');
    //     Route::get('/payment/receipt', 'cashierReceipt')->name('payment-receipt');
    //     Route::get('profile', 'cashierProfile')->name('profile');
    //     Route::get('/payment-history', 'cashierPaymentHistory')->name('payment-history');
    //     Route::get('email-history', 'cashierEmail')->name('email-history');
    //     Route::get('/user', 'getUser')->name('user');
    // });


    Route::controller(MReaderController::class)->group(function() {
        Route::get('/', 'index')->name('mreader.home');
        Route::get('/customers', 'customerList')->name('mreader.customers');
        Route::get('/readings', 'mReadings')->name('mreader.readings');
        Route::get('/profile', 'profile')->name('mreader.profile');

    });
});
