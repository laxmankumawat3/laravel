<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;

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

// *****************************************************************************************************************
                                    //  customer controller 
// *****************************************************************************************************************


// Route::get("/register",[CustomerController::class, "index"]);
Route::get('/customer', [CustomerController::class, 'index']);
Route::post('/addcustomer', [CustomerController::class, 'store']);

Route::get('/customer/softdelete/{id}', [CustomerController::class, 'softdelete'])->name('customer.softdelete');
Route::get('/customer/edit/{id}', [CustomerController::class, 'edit'])->name('customer.edit');

Route::post('/customer/edit/{id}', [CustomerController::class, 'update'])->name('customer.update');
Route::get('/customer/delete/{id}', [CustomerController::class, 'delete'])->name('customer.delete');
Route::get('/customer/restore/{id}', [CustomerController::class, 'restore'])->name('customer.restore');

Route::get('/customer/view',[CustomerController::class, 'view'])->name('customer.view');
// Route::get('/customer/view',[CustomerController::class, 'view'])->name('customer.view');
Route::get('/customer/trash',[CustomerController::class, 'trash']);



// *****************************************************************************************************************
                                    //  customer controller end
// *****************************************************************************************************************


Route::get('/', function () {
    return view('welcome');
});
Route::get('/register', function () {
    return view('form');
});

