<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\VoucherController;
use App\Http\Controllers\WarehouseController;
use App\Models\orderinfoes;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;


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

Route::get('/', [App\Http\Controllers\IndexController::class, 'index']);


Route::get('export', 'ExportController@export')->name('export');
// admin -- 

// category

Route::resource('category', CategoryController::class);
Route::get('/update-status-up', [App\Http\Controllers\CategoryController::class, 'update_status']);

// product 

Route::resource('product', ProductController::class);
Route::get('/update-category-product', [App\Http\Controllers\ProductController::class, 'update_category']);
Route::get('/update-status-up', [App\Http\Controllers\ProductController::class, 'update_status']);




// warehouse 
Route::resource('warehouse', WarehouseController::class);
Route::get('//update-status-warehouse-up', [App\Http\Controllers\arehouseController::class, 'update_status']);


// order
Route::get('/don-hang', [App\Http\Controllers\CartController::class, 'index']);
Route::get('/chi-tiet-don-hang/{id}', [App\Http\Controllers\CartController::class, 'details_order']);
Route::get('/update-don-hang', [App\Http\Controllers\CartController::class, 'update_status_cart']);
Route::get('/update-payment', [App\Http\Controllers\CartController::class, 'update_payment']);
Route::get('/delete-order/{id}', [App\Http\Controllers\CartController::class, 'delete_order']);


// warehouse

Route::post('/update-cart-qty-warehouse', [App\Http\Controllers\CartController::class, 'update_cart_qty_warehouse']);
// Route::get('/kho-hang', [App\Http\Controllers\WarehouseController::class, 'index']);


// authorization 
Route::get('/phan-quyen', [App\Http\Controllers\AuthorizationController::class, 'index']);
Route::get('/update-function', [App\Http\Controllers\AuthorizationController::class, 'update_function']);
Route::get('/update-manager', [App\Http\Controllers\AuthorizationController::class, 'update_manager']);
Route::get('/update-chat', [App\Http\Controllers\AuthorizationController::class, 'update_chat']);
Route::get('/update-admin', [App\Http\Controllers\AuthorizationController::class, 'update_admin']);

// diary 

Route::get('/nhat-ky', [App\Http\Controllers\DiaryController::class, 'index']);

// comment

Route::post('/post-comment', [App\Http\Controllers\CommentController::class, 'store']);
Route::get('/binh-luan', [App\Http\Controllers\CommentController::class, 'index']);
Route::get('/update-status-comment', [App\Http\Controllers\CommentController::class, 'status_comment']);
Route::get('/delete-comment/{id}', [App\Http\Controllers\CommentController::class, 'destroy']);
Route::get('/delete-public-comment/{id}', [App\Http\Controllers\CommentController::class, 'delete']);
Route::get('/update-comment/{id}', [App\Http\Controllers\CommentController::class, 'edit']);
Route::post('/reply-comment', [App\Http\Controllers\CommentController::class, 'reply']);


// voucher 

Route::resource('voucher', VoucherController::class);
Route::get('/update-percent', [App\Http\Controllers\VoucherController::class, 'update_percent']);
Route::get('/update-status-voucher', [App\Http\Controllers\VoucherController::class, 'status_voucher']);

// -- admin -- //

// Auth
Auth::routes();

// chart
Route::resource('chart', ChartController::class);
Route::get('/chartDemo', [App\Http\Controllers\ChartController::class, 'demo']);




// -- public -- 
Route::get('/mat-hang/{slug}', [App\Http\Controllers\IndexController::class, 'shop']);

// cart

Route::get('/remove-cart',[App\Http\Controllers\CartController::class, 'remove_cart']);
Route::post('/add-cart',[App\Http\Controllers\CartController::class, 'add_cart']);
Route::get('/gio-hang-cua-ban',[App\Http\Controllers\CartController::class, 'cart']);
Route::post('/update-cart',[App\Http\Controllers\CartController::class, 'update_cart']);
Route::post('/check-out',[App\Http\Controllers\CartController::class, 'checkout']);


Route::get('/chi-tiet-san-pham/{slug}', [App\Http\Controllers\IndexController::class, 'details']);

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'dashboard'])->name('home');


Route::get('order/export/{order_coder}', [App\Http\Controllers\CartController::class, 'export']);


