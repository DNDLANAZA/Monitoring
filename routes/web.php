<?php

use App\Http\Controllers\EquipmentController;
use App\Http\Controllers\FesController;
use App\Http\Controllers\GuardianController;
use App\Http\Controllers\MaintenanceController;
use App\Http\Controllers\LeaveCodeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserRoleController;
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

Auth::routes();


Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'role:admin'], function(){

    Route::resource('teams', TeamController::class);
    Route::resource('maintenance', MaintenanceController::class);
    Route::resource('equipment', EquipmentController::class);
    Route::resource('guardian', GuardianController::class);
    Route::resource('leavecode', LeaveCodeController::class);

    Route::get('/fes', [FesController::class, 'index'])->name('fes.index');
    Route::post('/fes', [FesController::class, 'store'])->name('fes.store');
    Route::get('/fes/create', [FesController::class, 'create'])->name('fes.create');
    Route::get('site/{id}', [FesController::class, 'show'])->name('fes.show');
    Route::get('site-edit/{id}', [FesController::class, 'edit'])->name('fes.edit');
    Route::put('site-update/{id}', [FesController::class, 'update'])->name('fes.update');
    Route::get('telecharger/{file}', [FesController::class, 'downloader'])->name('fes.downloader');
    Route::delete('site-delete/{id}', [FesController::class, 'destroy'])->name('fes.destroy');

    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::get('user/{id}', [UserController::class, 'show'])->name('users.show');
    Route::get('users-edit/{id}', [UserController::class, 'edit'])->name('users.edit');
    Route::put('users-update/{id}', [UserController::class, 'update'])->name('users.update');
    Route::delete('users-delete/{id}', [UserController::class, 'destroy'])->name('users.destroy');

    Route::get('/roles', [RoleController::class, 'index'])->name('roles.index');
    Route::post('/roles', [RoleController::class, 'store'])->name('roles.store');
    Route::get('/roles/create', [RoleController::class, 'create'])->name('roles.create');
    Route::get('rus/{id}', [RoleController::class, 'show'])->name('roles.show');
    Route::get('roles-edit/{id}', [RoleController::class, 'edit'])->name('roles.edit');
    Route::put('roles-update/{id}', [RoleController::class, 'update'])->name('roles.update');
    Route::delete('roles-delete/{id}', [RoleController::class, 'destroy'])->name('roles.destroy');

    Route::get('/role-user', [UserRoleController::class, 'index'])->name('rus.index');
    Route::post('/role-user', [UserRoleController::class, 'store'])->name('rus.store');
    Route::get('/role-user/create', [UserRoleController::class, 'create'])->name('rus.create');
    Route::get('role-user/{id}', [userRoleController::class, 'show'])->name('rus.show');
    Route::get('role-user-edit/{id}', [userRoleController::class, 'edit'])->name('rus.edit');
    Route::put('role-user-update/{id}', [userRoleController::class, 'update'])->name('rus.update');
    Route::delete('role-user-delete/{id}', [userRoleController::class, 'destroy'])->name('rus.destroy');

});

Route::group(['middleware' => 'role:maintenance'], function(){
    Route::resource('teams', TeamController::class);
    Route::resource('maintenance', MaintenanceController::class);
    Route::resource('equipment', EquipmentController::class);
    Route::resource('guardian', GuardianController::class);
    Route::resource('leavecode', LeaveCodeController::class);
});

Route::group(['middleware' => 'role:fe'], function(){
    Route::get('/fes', [FesController::class, 'index'])->name('fes.index');
    Route::post('/fes', [FesController::class, 'store'])->name('fes.store');
    Route::get('/fes/create', [FesController::class, 'create'])->name('fes.create');
    Route::get('site/{id}', [FesController::class, 'show'])->name('fes.show');
    Route::get('site-edit/{id}', [FesController::class, 'edit'])->name('fes.edit');
    Route::put('site-update/{id}', [FesController::class, 'update'])->name('fes.update');
    Route::get('telecharger/{file}', [FesController::class, 'downloader'])->name('fes.downloader');
    Route::delete('site-delete/{id}', [FesController::class, 'destroy'])->name('fes.destroy');
});



















// Route::get('/users', [UserController::class, 'index'])->name('users.index');
// Route::post('/users', [UserController::class, 'store'])->name('users.store');
// Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
// Route::get('user/{id}', [UserController::class, 'show'])->name('users.show');
// Route::get('users-edit/{id}', [UserController::class, 'edit'])->name('users.edit');
// Route::put('users-update/{id}', [UserController::class, 'update'])->name('users.update');
// Route::delete('users-delete/{id}', [UserController::class, 'destroy'])->name('users.destroy');

// Route::get('/roles', [RoleController::class, 'index'])->name('roles.index');
// Route::post('/roles', [RoleController::class, 'store'])->name('roles.store');
// Route::get('/roles/create', [RoleController::class, 'create'])->name('roles.create');
// Route::get('rus/{id}', [RoleController::class, 'show'])->name('roles.show');
// Route::get('roles-edit/{id}', [RoleController::class, 'edit'])->name('roles.edit');
// Route::put('roles-update/{id}', [RoleController::class, 'update'])->name('roles.update');
// Route::delete('roles-delete/{id}', [RoleController::class, 'destroy'])->name('roles.destroy');


// Route::get('/role-user', [RoleUSerController::class, 'index'])->name('rus.index');
// Route::post('/role-user', [RoleUSerController::class, 'store'])->name('rus.store');
// Route::get('/role-user/create', [RoleUSerController::class, 'create'])->name('rus.create');
// Route::get('role-user/{id}', [RoleUSerController::class, 'show'])->name('rus.show');
// Route::get('role-user-edit/{id}', [RoleUSerController::class, 'edit'])->name('rus.edit');
// Route::put('role-user-update/{id}', [RoleUSerController::class, 'update'])->name('rus.update');
// Route::delete('role-user-delete/{id}', [RoleUSerController::class, 'destroy'])->name('rus.destroy');

