<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductBehaviorController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
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
    $products = Product::all();
    return view('customer.home', compact('products'));
});

Route::get('/dashboard', function () {
    $customer_count = User::where('role', 'customer')->count();
    $transaction = Transaction::get();
    return view('dashboard', compact('customer_count', 'transaction'));
})->middleware(['auth','admin'])->name('dashboard');

Route::group(['middleware' => ['auth','admin']], function () {
    Route::resource('customer', UserController::class);
    Route::resource('product', ProductController::class);
    Route::resource('product-behavior', ProductBehaviorController::class);
    Route::resource('transaction', TransactionController::class);
    Route::get('setting', function(){
        $customer = Auth::user();
        return view('admin.setting', compact('customer'));
    })->name('setting');
});

Route::group(['middleware' => ['auth']], function () {
    Route::get('transaksi',[PageController::class,'transaction'])->name('page.transaction');
});

require __DIR__.'/auth.php';
