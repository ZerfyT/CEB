<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CashierController;
use App\Http\Controllers\MReaderController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\FacebookAuthController;
use App\Http\Controllers\GoogleAuthController;

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

Route::get('auth/google', [GoogleAuthController::class,'redirect'])->name('google-auth');
Route::get('auth/google/callback', [GoogleAuthController::class,'callbackGoogle']);

Route::get('auth/facebook', [FacebookAuthController::class,'redirect'])->name('facebook-auth');
Route::get('auth/facebook/callback', [FacebookAuthController::class,'facebookCallback']);

Route::prefix('cashier')->middleware(['auth', 'role:cashier'])->controller(CashierController::class)->group(function () {
    Route::get('/home', 'cashierHomepage')->name('cashier.home');
    Route::get('/payment', 'cashierPayments')->name('payment-home');
    Route::get('/payment/customer-bill', 'cashierCustomerBill')->name('customer-bill');
    Route::get('/payment/genarate-bill', 'cashierGenarateBill')->name('genarate-bill');
    Route::get('/payment/paybill', 'cashierPay')->name('paybill');
    Route::get('/payment/receipt', 'cashierReceipt')->name('payment-receipt');
    Route::get('profile', 'cashierProfile')->name('profile');
    Route::get('/payment-history', 'cashierPaymentHistory')->name('payment-history');
    Route::get('email-history', 'cashierEmail')->name('email-history');
    Route::get('/user', 'getUser')->name('user');
});

Route::prefix('mreader')->middleware(['auth', 'role:meter-reader'])->controller(MReaderController::class)->group(function () {
    Route::get('/home', 'index')->name('mreader.home');
    Route::get('/customers', 'customerList')->name('mreader.customers');
    Route::get('/readings', 'mReadings')->name('mreader.readings');
    Route::get('/profile', 'profile')->name('mreader.profile');
    Route::post('/registerCustomer', 'registerCustomer')->name('mreader.registerCustomer');
    Route::post('/addMReading', 'addMReading')->name('mreader.addMReading');
    Route::get('/search/{page}', 'searchAccounts')->name('mreader.search');
    Route::post('/profile/update-info', 'updateProfileInfo')->name('mreader.updateProfileInfo');
});



// Route::group(['middleware' => 'auth'], function () {

//     Route::middleware(['role:cashier'])->controller(CashierController::class)->group(function () {
//         Route::get('/', 'cashierHomepage')->name('home');
//         Route::get('/payment', 'cashierPayments')->name('payment-home');
//         Route::get('/payment/customer-bill', 'cashierCustomerBill')->name('customer-bill');
//         Route::get('/payment/genarate-bill', 'cashierGenarateBill')->name('genarate-bill');
//         Route::get('/payment/paybill', 'cashierPay')->name('paybill');
//         Route::get('/payment/receipt', 'cashierReceipt')->name('payment-receipt');
//         Route::get('profile', 'cashierProfile')->name('profile');
//         Route::get('/payment-history', 'cashierPaymentHistory')->name('payment-history');
//         Route::get('email-history', 'cashierEmail')->name('email-history');
//         Route::get('/user', 'getUser')->name('user');
//     });


//     Route::middleware(['role:meter-reader'])->controller(MReaderController::class)->group(function () {
//         Route::get('/', 'index')->name('mreader.home');
//         Route::get('/customers', 'customerList')->name('mreader.customers');
//         Route::get('/readings', 'mReadings')->name('mreader.readings');
//         Route::get('/profile', 'profile')->name('mreader.profile');
//     });
// });

Route::get('/error', function () {
    return view('error');
})->name('error');

Route::get('/', function () {
    return view('index');
})->name('index');

Route::prefix('customer')->middleware(['auth', 'role:user'])->controller(CustomerController::class)->group(function () {
    Route::get('/home', 'customerHome')->name('customer.home');
    Route::get('/payment', 'customerPayment')->name('customer.payment');
    Route::get('/profile', 'customerProfile')->name('customer.profile');
    Route::get('/detail', 'customerDetails')->name('customer.details');
    Route::get('/account', 'customerAccount')->name('customer.account');
});
// Route::fallback(function () {
//     return view('index');
// })->name('index');
