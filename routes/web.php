<?php

use Illuminate\Routing\RouteGroup;
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
    return view('welcome');
});
/*encrypt password
Route::get('/updatepassword', [App\Http\Controllers\Admin\Admincontroller::class, 'updatepassword'])->name('catagory');
*/
Route::get('admin/login', [App\Http\Controllers\Admin\Admincontroller::class, 'login'])->name('login');
Route::post('admin/login/auth', [App\Http\Controllers\Admin\Admincontroller::class, 'auth'])->name('auth');

//declearing middleware in route
Route::group(['middleware'=>'admin_auth', 'prefix'=>'admin'],function(){
Route::prefix('dashboard')->group(function(){
    Route::get('/', [App\Http\Controllers\Admin\Admincontroller::class, 'dashboard'])->name('dashboard');
});

Route::prefix('catagory')->group(function(){
    Route::get('/', [App\Http\Controllers\Admin\Catagorycontroller::class, 'catagory'])->name('catagory');
    Route::get('/addCatagory', [App\Http\Controllers\Admin\Catagorycontroller::class, 'addCatagory'])->name('addCatagory');
    Route::post('/createCatagory', [App\Http\Controllers\Admin\Catagorycontroller::class, 'createCatagory'])->name('createCatagory');
    Route::get('/editCatagory/{id}', [App\Http\Controllers\Admin\Catagorycontroller::class, 'editCatagory'])->name('editCatagory');
    Route::post('/updateCatagory/{id}', [App\Http\Controllers\Admin\Catagorycontroller::class, 'updateCatagory'])->name('updateCatagory');
    Route::post('/delete', [App\Http\Controllers\Admin\Catagorycontroller::class, 'deleteCatagory'])->name('deleteCatagory');
});

Route::prefix('coupon')->group(function(){
    Route::get('/', [App\Http\Controllers\Admin\Couponcontroller::class, 'coupon'])->name('coupon');
    Route::get('/addcoupon', [App\Http\Controllers\Admin\Couponcontroller::class, 'addcoupon'])->name('addcoupon');
    Route::post('/createcoupon', [App\Http\Controllers\Admin\Couponcontroller::class, 'createcoupon'])->name('createcoupon');
    Route::get('/editcoupon/{id}', [App\Http\Controllers\Admin\Couponcontroller::class, 'editcoupon'])->name('editcoupon');
    Route::post('/updatecoupon/{id}', [App\Http\Controllers\Admin\Couponcontroller::class, 'updatecoupon'])->name('updatecoupon');
    Route::post('/delete', [App\Http\Controllers\Admin\Couponcontroller::class, 'deleteCoupon'])->name('deleteCoupon');

});

Route::prefix('size')->group(function(){
    Route::get('/', [App\Http\Controllers\Admin\Sizecontroller::class, 'size'])->name('size');
    Route::get('/addsize', [App\Http\Controllers\Admin\Sizecontroller::class, 'addsize'])->name('addsize');
    Route::post('/createsize', [App\Http\Controllers\Admin\Sizecontroller::class, 'createsize'])->name('createsize');
    Route::get('/editsize/{id}', [App\Http\Controllers\Admin\Sizecontroller::class, 'editsize'])->name('editsize');
    Route::post('/updatesize/{id}', [App\Http\Controllers\Admin\Sizecontroller::class, 'updatesize'])->name('updatesize');
    Route::post('/delete', [App\Http\Controllers\Admin\Sizecontroller::class, 'deletesize'])->name('deletesize');

});
   
Route::get('/logout', function () {
         session()->forget('ADMIN_LOGIN');
         session()->forget('ADMIN_ID');
         session()->flash('message', ' logout successfully');
        return redirect('admin/login');
    });

});



