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
// [App\Http\Controllers\HomeController::class, 'index']
Route::get('/', [App\Http\Controllers\Auth\LoginController::class,'formlogin'])->name('login');
Route::post('/postlogin', [App\Http\Controllers\Auth\LoginController::class,'postLogin']);
Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class,'logout'])->name('logout');
Route::get('email/verify', [App\Http\Controllers\Auth\VerificationController::class,'show'])->name('verification.notice');
Route::get('email/verify/{id}/{hash}', [App\Http\Controllers\Auth\VerificationController::class,'verify'])->name('verification.verify');
Route::post('email/resend', [App\Http\Controllers\Auth\VerificationController::class,'resend'])->name('verification.resend');
Route::post('/regis', [App\Http\Controllers\Auth\RegisterController::class,'regis'])->name('register');

Route::group(['middleware' => 'auth'], function(){
    Route::get('dashboard_admin', [App\Http\Controllers\Admin\AdminController::class,'dashboard_admin']);
    Route::get('list_user', [App\Http\Controllers\Admin\AdminController::class,'list_user']);
    Route::get('api_user', [App\Http\Controllers\Admin\AdminController::class,'api_user']);
    Route::get('reset_password/{id}', [App\Http\Controllers\Admin\AdminController::class,'reset_password']);
    Route::get('aktivasi', [App\Http\Controllers\Admin\AdminController::class,'aktivasi']);
    Route::get('api_logproduct/{date}', [App\Http\Controllers\Admin\AdminController::class,'api_logproduct']);
    Route::get('list_logproduct', [App\Http\Controllers\Admin\AdminController::class,'list_logproduct']);
    Route::get('api_dashboard', [App\Http\Controllers\Admin\AdminController::class,'api_dashboard']);
    //customer
    Route::get('list_product', [App\Http\Controllers\Customer\CustomerController::class,'list_product']);
    // Route::get('api_logproduct', [App\Http\Controllers\Customer\CustomerController::class,'api_logproduct']);
    Route::get('form_product', [App\Http\Controllers\Product\ProductController::class,'form_product']);
    Route::post('add_productlog', [App\Http\Controllers\Product\ProductController::class,'product']);
});