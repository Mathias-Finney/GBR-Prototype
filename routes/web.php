<?php

use App\Models\Terminal;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CityCodeController;
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

Route::get('/', function () {
    return view('welcome');
});
// User Frontend All Route
Route::get('/home', [UserController::class, 'Index'])->name('homepage');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

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
    // Terminal all Routed
    Route::controller(TerminalController::class)->group(function(){
        Route::get('/all/terminal', 'AllTerminal')->name('all.terminal');
        Route::get('/add/terminal', 'AddTerminal')->name('add.terminal');
        Route::post('/store/terminal', 'StoreTerminal')->name('store.terminal');
        Route::get('/edit/terminal/{id}', 'EditTerminal')->name('edit.terminal');
        Route::post('/update/terminal', 'UpdateTerminal')->name('update.terminal');
        Route::get('/delete/terminal/{id}', 'DeleteTerminal')->name('delete.terminal');

    });
    // city all Routed
    Route::controller(CityCodeController::class)->group(function(){
        Route::get('/all/city', 'AllCity')->name('all.city');
        Route::get('/add/city', 'AddCity')->name('add.city');
        Route::post('/store/city', 'StoreCity')->name('store.city');
        Route::get('/edit/city/{id}', 'EditCity')->name('edit.city');
        Route::post('/update/city', 'UpdateCity')->name('update.city');
        Route::get('/delete/city/{id}', 'DeleteCity')->name('delete.city');

    });
});


require __DIR__.'/auth.php';
