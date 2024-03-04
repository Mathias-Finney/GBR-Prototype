<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TerminalController;
use App\Http\Controllers\Backend\BusController;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/userlogin', function () {
    return view('frontend.register');
});
// User Frontend All Route
Route::get('/', [UserController::class, 'Index'])->name('homepage');

Route::get('/dashboard', function () {
    return view('profile.edituser');
})->middleware(['auth', 'verified'])->name('dashboard');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
// Admin group middleware
Route::middleware(['auth', 'role:admin'])->group(function(){

    Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');
    
    Route::get('/admin/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout');

    Route::get('/admin/profile', [AdminController::class, 'AdminProfile'])->name('admin.profile');

    Route::post('/admin/profile/store', [AdminController::class, 'AdminProfileStore'])->name('admin.profile.store');

    Route::get('/admin/change/password', [AdminController::class, 'AdminChangePassword'])->name('admin.change.password');

    Route::post('/admin/update/password', [AdminController::class, 'AdminUpdatePassword'])->name('admin.update.password');
});

// Agent group middleware
Route::middleware(['auth', 'role:agent'])->group(function(){
    Route::get('/agent/dashboard', [AgentController::class, 'AgentDashboard'])->name('agent.dashboard');
    Route::get('/agent/logout', [AgentController::class, 'AgentLogout'])->name('agent.logout');
});

Route::get('/admin/login', [AdminController::class, 'AdminLogin'])->name('admin.login');

Route::get('/agent/login', [AgentController::class, 'AgentLogin'])->name('agent.login');

// Admin group middleware
Route::middleware(['auth', 'role:admin'])->group(function(){
    //Buses All Route
    Route::controller(BusController::class)->group(function(){
        Route::get('/all/buses', 'AllBuses')->name('all.bus');
        Route::get('/add/buses', 'AddBuses')->name('add.bus');
        Route::post('/store/buses', 'StoreBuses')->name('store.buses');
        Route::get('/edit/bus/{id}', 'EditBuses')->name('edit.buses');
        Route::post('/update/bus', 'UpdateBuses')->name('update.buses');
        Route::get('/delete/bus/{id}', 'DeleteBus')->name('delete.bus');

    });
    //Regions Controller
    Route::controller(RegionController::class)->group(function(){
        Route::get('/all/reg', 'AllReg')->name('all.reg');
        Route::get('/add/reg', 'AddReg')->name('add.reg');
        Route::post('/store/reg', 'StoreReg')->name('store.reg');
        Route::get('/edit/reg/{id}', 'EditReg')->name('edit.reg');
        Route::post('/update/reg', 'UpdateReg')->name('update.reg');
        Route::get('/delete/reg/{id}', 'DeleteReg')->name('delete.reg');

    });
    //Terminals Controller
    Route::controller(TerminalController::class)->group(function(){
        Route::get('/all/tem', 'AllTem')->name('all.tem');
        Route::get('/add/tem', 'AddTem')->name('add.tem');
        Route::post('/store/tem', 'StoreTem')->name('store.tem');
        Route::get('/edit/tem/{id}', 'EditTem')->name('edit.tem');
        Route::post('/update/tem', 'UpdateTem')->name('update.tem');
        Route::get('/delete/tem/{id}', 'DeleteTem')->name('delete.tem');

    });
});


require __DIR__.'/auth.php';
