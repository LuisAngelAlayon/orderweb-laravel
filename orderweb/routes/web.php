<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\CausalController;
use App\Http\Controllers\ObservationController;
use App\Http\Controllers\TechnicianController;
use App\Http\Controllers\Type_ActivityController;
use App\Models\Technician;
use Database\Seeders\ObservationSeeder;
use Illuminate\Support\Facades\Route;

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
    return view('index');
})->name('index');

Route::get('/test2', function () {
    return view('test2');
})->name('test2');

Route::prefix('causal')->group(function () {
    Route::get('/index', [CausalController::class, 'index'])->name('causal.index');
    Route::get('/create', [CausalController::class, 'create'])->name('causal.create');
    Route::get('/edit/{id}', [CausalController::class, 'edit'])->name('causal.edit');
    Route::post('create', [CausalController::class, 'store'])->name('causal.store');
    Route::put('/edit/{id}', [CausalController::class, 'update'])->name('causal.update');
    Route::get('/destroy/{id}', [CausalController::class, 'destroy'])->name('causal.destroy');

});

Route::prefix('observation')->group(function () {
    Route::get('/index', [ObservationController::class, 'index'])->name('observation.index');
    Route::get('/create', [ObservationController::class, 'create'])->name('observation.create');
    Route::get('/edit/{id}', [ObservationController::class, 'edit'])->name('observation.edit');
    Route::post('create', [ObservationController::class, 'store'])->name('observation.store');
    Route::put('/edit/{id}', [ObservationController::class, 'update'])->name('observation.update');
    Route::get('/destroy/{id}', [ObservationController::class, 'destroy'])->name('observation.destroy');

});

Route::prefix('type_activity')->group(function () {
    Route::get('/index', [Type_ActivityController::class, 'index'])->name('type_activity.index');
    Route::get('/create', [Type_ActivityController::class, 'create'])->name('type_activity.create');
    Route::get('/edit/{id}', [Type_ActivityController::class, 'edit'])->name('type_activity.edit');
    Route::post('create', [Type_ActivityController::class, 'store'])->name('type_activity.store');
    Route::put('/edit/{id}', [Type_ActivityController::class, 'update'])->name('type_activity.update');
    Route::get('/destroy/{id}', [Type_ActivityController::class, 'destroy'])->name('type_activity.destroy');

});

Route::prefix('technician')->group(function () {
    Route::get('/index', [TechnicianController::class, 'index'])->name('technician.index');
    Route::get('/create', [TechnicianController::class, 'create'])->name('technician.create');
    Route::get('/edit/{document}', [TechnicianController::class, 'edit'])->name('technician.edit');
    Route::post('create', [TechnicianController::class, 'store'])->name('technician.store');
    Route::put('/edit/{document}', [TechnicianController::class, 'update'])->name('technician.update');
    Route::get('/destroy/{document}', [TechnicianController::class, 'destroy'])->name('technician.destroy');

});

Route::prefix('activity')->group(function () {
    Route::get('/index', [ActivityController::class, 'index'])->name('activity.index');
    Route::get('/create', [ActivityController::class, 'create'])->name('activity.create');
    Route::get('/edit/{id}', [ActivityController::class, 'edit'])->name('activity.edit');
    Route::post('create', [ActivityController::class, 'store'])->name('activity.store');
    Route::put('/edit/{id}', [ActivityController::class, 'update'])->name('activity.update');
    Route::get('/destroy/{id}', [ActivityController::class, 'destroy'])->name('activity.destroy');

});



Route::get('/order/create', function () {
    return view('order.create');
})->name('order.create');

Route::get('/order/index', function () {
    return view('order.index');
})->name('order.index');

Route::get('/order/edit', function () {
    return view('order.edit');
})->name('order.edit');

