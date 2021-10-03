<?php

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
    return view('auth.login');
});



Auth::routes();

Route::group(['middleware' => 'auth'], function ()
{

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// distributor login
Route::get('/add_po', [App\Http\Controllers\purchase_order_controller::class, 'add_po'])->name('add_po');
Route::get('/view_po', [App\Http\Controllers\purchase_order_controller::class, 'view_po'])->name('view_po');
Route::POST('/add_po_data', [App\Http\Controllers\purchase_order_controller::class, 'add_po_data'])->name('add_po_data');
Route::POST('/find_po', [App\Http\Controllers\purchase_order_controller::class, 'find_po'])->name('find_po');
Route::get('/export/{id}', [App\Http\Controllers\purchase_order_controller::class, 'export'])->name('export');


// admin login
// page loading
Route::get('/admin/add_zone', [App\Http\Controllers\AdminController::class, 'add_zone'])->name('add_zone');
Route::get('/admin/add_region', [App\Http\Controllers\AdminController::class, 'add_region'])->name('add_region');
Route::get('/admin/add_territory', [App\Http\Controllers\AdminController::class, 'add_territory'])->name('add_territory');
Route::get('/admin/add_product', [App\Http\Controllers\AdminController::class, 'add_product'])->name('add_product');


// Insert data
Route::POST('/admin/insert_zone', [App\Http\Controllers\AdminController::class, 'insert_zone'])->name('insert_zone');
Route::POST('/admin/insert_region', [App\Http\Controllers\AdminController::class, 'insert_region'])->name('insert_region');
Route::POST('/admin/insert_territory', [App\Http\Controllers\AdminController::class, 'insert_territory'])->name('insert_territory');
Route::POST('/admin/insert_product', [App\Http\Controllers\AdminController::class, 'insert_product'])->name('insert_product');


});


