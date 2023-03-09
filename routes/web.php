<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AffiliateController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\FleetAssetController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FleetDataController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserRoleController;
use App\Http\Controllers\VendorController;
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
    auth()->logout();
    return view('frontend.account-type');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Admin
Route::group(['prefix' => 'admin'], function () {
    Route::get('/login', [AdminController::class, 'login'])->name('admin.login'); 
    Route::get('/register', [AdminController::class, 'register'])->name('admin.register'); 
    Route::post('/signup', [AdminController::class, 'signup'])->name('admin.signup'); 
    Route::post('/adminlogin', [AdminController::class, 'adminlogin'])->name('admin.adminlogin'); 
    Route::get('/get/transection', [AdminController::class, 'transection'])->name('admin.transection'); 
    Route::get('/affiliate/list', [AdminController::class, 'affiliateList'])->name('admin.affiliateList'); 
});
//Affiliate
Route::group(['prefix' => 'affiliate'], function () {
    Route::get('/login', [AffiliateController::class, 'login'])->name('affiliate.login'); 
    Route::get('/register', [AffiliateController::class, 'register'])->name('affiliate.register'); 
    Route::get('/sub-affiliate-register', [AffiliateController::class, 'subAffiliateRegister'])->name('affiliate.subAffiliateRegister'); 
    Route::post('/signup', [AffiliateController::class, 'signup'])->name('affiliate.signup'); 
    Route::post('/affiliatelogin', [AffiliateController::class, 'affiliatelogin'])->name('affiliate.affiliatelogin'); 
    Route::get('/commission', [AffiliateController::class, 'commission'])->name('affiliate.commission'); 
    Route::get('/sub/affiliate/list', [AffiliateController::class, 'subAffiliateList'])->name('affiliate.subAffiliateList'); 
    Route::get('/information/{id}', [AffiliateController::class, 'information'])->name('affiliate.information'); 
});
//User
Route::group(['prefix' => 'user'], function () {
    Route::get('/login', [UserController::class, 'login'])->name('user.login'); 
    Route::get('/register', [UserController::class, 'register'])->name('user.register'); 
    Route::post('/signup', [UserController::class, 'signup'])->name('user.signup'); 
    Route::post('/userlogin', [UserController::class, 'userlogin'])->name('user.userlogin'); 
    Route::get('/information/{id}', [UserController::class, 'information'])->name('user.information'); 
    Route::get('/add-money/{id}', [UserController::class, 'addMoney'])->name('user.addMoney'); 
    Route::post('/store-money', [UserController::class, 'storeMoney'])->name('user.storeMoney'); 
    Route::get('/transection', [UserController::class, 'transection'])->name('user.transection'); 
});