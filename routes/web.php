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
    Route::get('aktivasi/{id}', [App\Http\Controllers\Admin\AdminController::class,'aktivasi']);
    Route::get('api_logbarang', [App\Http\Controllers\Admin\AdminController::class,'api_logbarang']);
    Route::get('list_logbarang', [App\Http\Controllers\Admin\AdminController::class,'list_logbarang']);
    Route::get('detailbarang/{id}', [App\Http\Controllers\Admin\AdminController::class,'detailbarang']);
    Route::post('actionbarang/{id}/{status}', [App\Http\Controllers\Admin\AdminController::class,'actionbarang']);
    Route::get('api_dashboard', [App\Http\Controllers\Admin\AdminController::class,'api_dashboard']);
    //customer
    Route::get('list_pengajuan', [App\Http\Controllers\Customer\CustomerController::class,'list_pengajuan']);
    Route::get('api_logpengajuan', [App\Http\Controllers\Customer\CustomerController::class,'api_logpengajuan']);
    Route::get('form_pengembalian', [App\Http\Controllers\Customer\CustomerController::class,'form_pengembalian']);
    Route::post('pengembalian', [App\Http\Controllers\Customer\CustomerController::class,'pengembalian']);
});