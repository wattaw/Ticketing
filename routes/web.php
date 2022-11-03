<?php

use illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\User\CheckoutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\User\DashboardController as UserDashboard;
use App\Http\Controllers\Admin\DashboardController as AdminDashboard;
use App\Http\Controllers\Admin\CheckoutController as AdminCheckout;
use App\Http\Controllers\Admin\DiscountController as AdminDiscount;
use App\Http\Controllers\Admin\ValidationController as AdminValidation;
use App\Http\Controllers\Admin\QRController as AdminQR;
use App\Http\Controllers\DemoController;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use SimpleSoftwareIO\QrCode\Generator;

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
    return view('welcome');
})->name('welcome');

// socialite routes
Route::get('sign-in-google', [UserController::class, 'google'])->name('user.login.google');
Route::get('auth/google/callback', [UserController::class, 'handleProviderCallback'])->name('user.google.callback');

// midtrans routes
Route::get('payment/success', [CheckoutController::class, 'midtransCallback']);
Route::post('payment/success', [CheckoutController::class, 'midtransCallback']);

// Demo
Route::get('/demo',[DemoController::class,'demo'])->name('demo.create');
Route::post('/demo',[DemoController::class,'store'])->name('demo.store');


        // admin search
        Route::get('admin/search',[AdminDashboard::class,'search']);


// checkout nonUser
Route::get('checkout/success', [CheckoutController::class, 'success'])->name('checkout.success');
Route::get('checkout/{event:slug}', [CheckoutController::class, 'create'])->name('checkout.create');
Route::post('checkout/{event}', [CheckoutController::class, 'store'])->name('checkout.store');


Route::middleware(['auth'])->group(function () {
        // QR Code Generator
        Route::get('admin/scan', [AdminValidation::class,'scan'])->name('admin.scan')->middleware('ensureUserRole:admin');
        Route::post('admin/scan',[AdminValidation::class,'store'])->name('store');
    // checkout routes
    // Route::get('checkout/success', [CheckoutController::class, 'success'])->name('checkout.success');
    // Route::get('checkout/{camp:slug}', [CheckoutController::class, 'create'])->name('checkout.create');
    // Route::post('checkout/{camp}', [CheckoutController::class, 'store'])->name('checkout.store');

    //Route::get('checkout/{camp:slug}', [CheckoutController::class, 'create'])->name('checkout.create')->middleware('ensureUserRole:user');
    //Route::post('checkout/{camp}', [CheckoutController::class, 'store'])->name('checkout.store')->middleware('ensureUserRole:user');

    // dashboard
    Route::get('dashboard', [HomeController::class, 'dashboard'])->name('dashboard');

    // user dashboard
    Route::prefix('user/dashboard')->namespace('User')->name('user.')->middleware('ensureUserRole:user')->group(function(){
        Route::get('/', [UserDashboard::class, 'index'])->name('dashboard');
    });

    // admin dashboard
    Route::prefix('admin/dashboard')->name('admin.')->middleware('ensureUserRole:admin')->group(function(){
        Route::get('/', [AdminDashboard::class, 'index'])->name('dashboard');

        // admin checkout
        Route::post('checkout/{checkout}', [AdminCheckout::class, 'update'])->name('checkout.update');

        // admin discount
        Route::resource('discount', AdminDiscount::class);

        // // // admin qrcode
        //  Route::get('qrcoba', [AdminQR::class]);
    });

});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
