<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\LoginController;
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

Route::get('/', [App\Http\Controllers\HomeController::class,'index'])->name("home.index");
Route::get('/categories/{id?}', [App\Http\Controllers\HomeController::class,'get_products_by_categories'])->name('home.categories');


Route::get('/admin', function () {
    return view('admin.app');
})->name("admin")->middleware('auth');
Route::get('/admin/loaisp', [AdminController::class,'loaisp_index'])->name("admin.loaisp.index");
Route::get('/admin/{id?}/xoaloai', [AdminController::class,'loaisp_delete'])->name("admin.loaisp.delete");
Route::get('/admin/{id?}/showloai', [AdminController::class,'loaisp_show'])->name("admin.loaisp.show");
Route::post('/admin/{id?}/updateloai', [AdminController::class,'loaisp_update'])->name("admin.loaisp.update");
Route::get('/admin/new', [AdminController::class,'loaisp_new'])->name("admin.loaisp.new");
Route::post('/admin/store', [AdminController::class,'loaisp_store'])->name("admin.loaisp.addnew");

Route::get('/admin/sp', [AdminController::class, 'sanpham_index'])->name("admin.sp.index");
Route::get('/admin/{id?}/xoasp', [AdminController::class, 'sanpham_delete'])->name("admin.sp.delete");
Route::get('/admin/{id?}/showsp', [AdminController::class, 'sanpham_show'])->name("admin.sp.show");
Route::post('/admin/{id?}/updatesp', [AdminController::class, 'sanpham_update'])->name("admin.sp.update");
Route::get('/admin/newsp', [AdminController::class, 'sanpham_new'])->name("admin.sp.new");
Route::post('/admin/storesp', [AdminController::class, 'sanpham_store'])->name("admin.sp.addnew");



Route::get('/homemaster', function () {
    return view('homemaster');
});
Route::get('/shopdetails/{id}', [App\Http\Controllers\HomeController::class, 'shopdetails'])->name('home.shopdetails');

Route::controller(App\Http\Controllers\cartcontroller::class)->group(function(){
    Route::get('/AddCart/{id?}', 'addToCart')->name('AddToCart');
    Route::get('/cart','viewCart')->name('ViewCart');
    Route::get('/Cart/Remove/{id?}','removeItem')->name('RemoveItem');
    Route::get('/Cart/Increase/{id?}','IncreaseQuantity')->name('Increase');
    Route::get('/Cart/Decrease/{id?}','DecreaseQuantity')->name('Decrease');
    Route::post('/Check','PlayOrder')->name('PlayOrder');
    Route::get('/checkout', "checkout");
});



Route::get('/register', function () {
    return view('register');
});

Route::get('/login',[LoginController::class,'index'])->name('login');
Route::post('/authenticate',[LoginController::class,'Authenticate'])->name('Authenticate');
Route::post('/register',[LoginController::class,'register'])->name('Register');
Route::get('/logout',[LoginController::class,'logout'])->name('Logout');
