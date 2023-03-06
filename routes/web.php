<?php

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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// user
Route::post('/custom-login', [UserController::class, 'customLogin'])->name('customLogin'); 
Route::get('get-user', [UserController::class, 'userList'])->name('userList');
Route::get('change-user-status', [UserController::class, 'changeUserStatus'])->name('changeUserStatus');
Route::get('/edit-user/{id}', [UserController::class, 'editUser'])->name('editUser');
Route::post('/update-user', [UserController::class, 'updateUser'])->name('updateUser');
Route::post('/post-email', [UserController::class, 'postEmail'])->name('postEmail');
Route::get('/delete-user/{id}', [UserController::class, 'deleteUser'])->name('deleteUser');
Route::get('user-feature-list', [UserController::class, 'userFeatureList'])->name('userFeatureList');
Route::get('/add-user-feature/{id}', [UserController::class, 'addUserFeature'])->name('addUserFeature');
Route::post('/store-user-feature', [UserController::class, 'storeUserFeature'])->name('storeUserFeature');

// user role
Route::get('/user-role-list', [UserRoleController::class, 'userRoleList'])->name('userRoleList');
Route::post('/store-user-role', [UserRoleController::class, 'storeUserRole'])->name('storeUserRole');
Route::post('/update-user-role', [UserRoleController::class, 'updateUserRole'])->name('updateUserRole');
Route::get('/delete-user-role/{id}', [UserRoleController::class, 'deleteUserRole'])->name('deleteUserRole');