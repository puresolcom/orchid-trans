<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Mapping\UsersMigrationController;
use App\Http\Controllers\Invoice\InvoiceController;
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
});
Route::prefix('users')->group(function () {
    Route::get('register/{role:slug}', [UserController::class, 'register'])->name('users.register');
    Route::post('register', [UserController::class, 'store'])->name('users.store');
});

Route::get('/user/migration', [UsersMigrationController::class, 'getallUsers']);
Route::get('/invoice/modal',[InvoiceController::class,'getInvoiceEditModal'])->name('invoice.data.modal');
Route::get('/invoice/add/more/chargeline',[InvoiceController::class,'addMoreChargeLine'])->name('invoice.add.more.charge');