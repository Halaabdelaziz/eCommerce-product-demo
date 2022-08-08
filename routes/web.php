<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

use App\Http\Controllers\PinikleServiceController;

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


Route::get('/products',[ProductController::class,'index'])->name('product')->middleware(['auth']);

Route::post('/transactions',[PinikleServiceController::class, "listOfPayments"])->name('transactions');

Route::post('/pay',[PinikleServiceController::class, "pay"])->name('pay');

Route::get('/paid',[PinikleServiceController::class, "loadViewPaid"]);
Route::get('/fail',[PinikleServiceController::class, "loadViewfail"]);
Route::get('/cancel',[PinikleServiceController::class, "loadViewfail"]);

Route::get('/', function () {
    return view('welcome');
});


require __DIR__.'/auth.php';
