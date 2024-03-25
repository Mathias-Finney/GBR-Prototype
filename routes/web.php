<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\RouteController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TerminalController;
use App\Http\Controllers\Backend\BusController;
use App\Http\Controllers\TripController;
use App\Http\Controllers\BusHiringController;
use App\Http\Controllers\TicketController;

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

// User Frontend All Route
Route::get('/', [UserController::class, 'Index'])->name('homepage');
Route::get('/routes', [UserController::class, 'Route'])->name('routepage');
Route::post('/route', [UserController::class, 'RouteSearch'])->name('routepageSearch');
Route::get('/busHiring', [UserController::class, 'BusHiring'])->name('busHiring');
Route::get('/aboutus', [UserController::class, 'AboutUs'])->name('aboutUs');


// Bus Hiring Frontend 
Route::post('/busHire', [BusHiringController::class, 'StoreBusHiring'])->name('user.store.busHiring');

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
    //BusHiring Controller
    Route::controller(BusHiringController::class)->group(function(){
        Route::get('/all/busHiring', 'AllBusHiring')->name('all.busHiring');
        Route::get('/add/busHiring', 'AddBusHiring')->name('add.busHiring');
        Route::post('/store/busHiring', 'StoreBusHiring')->name('store.busHiring');
        Route::get('/edit/busHiring/{id}', 'EditBusHiring')->name('edit.busHiring');
        Route::get('/update/busHiringStatus/{id}/{status}', 'UpdateBusHiringStatus')->name('update.busHiringStatus');
        Route::post('/update/busHiring', 'UpdateBusHiring')->name('update.busHiring');
        Route::get('/delete/busHiring/{id}', 'DeleteBusHiring')->name('delete.busHiring');

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
        Route::get('/all/teminals', 'AllTem')->name('all.tem');
        Route::get('/add/teminal', 'AddTem')->name('add.tem');
        Route::post('/store/teminal', 'StoreTem')->name('store.tem');
        Route::get('/edit/teminal/{id}', 'EditTem')->name('edit.tem');
        Route::post('/update/teminal', 'UpdateTem')->name('update.tem');
        Route::get('/delete/teminal/{id}', 'DeleteTem')->name('delete.tem');

    });

    //Routes Controller
    Route::controller(RouteController::class)->group(function(){
        Route::get('/all/route', 'AllRoute')->name('all.route');
        Route::get('/add/route', 'AddRoute')->name('add.route');
        Route::post('/store/route', 'StoreRoute')->name('store.route');
        Route::get('/edit/route/{id}', 'EditRoute')->name('edit.route');
        Route::post('/update/route', 'UpdateRoute')->name('update.route');
        Route::get('/delete/route/{id}', 'DeleteRoute')->name('delete.route');

    });

    //Driver Controller
    Route::controller(DriverController::class)->group(function(){
        Route::get('/all/drivers', 'AllDriver')->name('all.driver');
        Route::get('/add/driver', 'AddDriver')->name('add.driver');
        Route::post('/store/driver', 'StoreDriver')->name('store.driver');
        Route::get('/edit/driver/{id}', 'EditDriver')->name('edit.driver');
        Route::post('/update/driver', 'UpdateDriver')->name('update.driver');
        Route::get('/delete/driver/{id}', 'DeleteDriver')->name('delete.driver');

    });

    //Payment Controller
    Route::controller(PaymentController::class)->group(function(){
        Route::get('/all/payments', 'AllPayment')->name('all.payment');
        Route::get('/add/payment', 'AddPayment')->name('add.payment');
        Route::post('/store/payment', 'StorePayment')->name('store.payment');
        Route::get('/edit/payment/{id}', 'EditPayment')->name('edit.payment');
        Route::post('/update/payment', 'UpdatePayment')->name('update.payment');
        Route::get('/delete/payment/{id}', 'DeletePayment')->name('delete.payment');

    });

    //Payment Controller
    Route::controller(TripController::class)->group(function(){
        Route::get('/all/trips', 'AllTrip')->name('all.trip');
        Route::get('/add/trip', 'AddTrip')->name('add.trip');
        Route::post('/store/trip', 'StoreTrip')->name('store.trip');
        Route::get('/edit/trip/{id}', 'EditTrip')->name('edit.trip');
        Route::post('/update/trip', 'UpdateTrip')->name('update.trip');
        Route::get('/delete/trip/{id}', 'DeleteTrip')->name('delete.trip');

    });

    Route::controller(TicketController::class)->group(function(){
        Route::get('/all/tickets', 'AllTicket')->name('all.ticket');
        Route::get('/add/ticket', 'AddTicket')->name('add.ticket');
        Route::post('/store/ticket', 'StoreTicket')->name('store.ticket');
        Route::get('/edit/ticket/{id}', 'EditTicket')->name('edit.ticket');
        Route::post('/update/ticket', 'UpdateTicket')->name('update.ticket');
        Route::get('/delete/ticket/{id}', 'DeleteTicket')->name('delete.ticket');

    });
});


require __DIR__.'/auth.php';
