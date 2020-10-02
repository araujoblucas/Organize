<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TasksController;
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

Route::redirect('/', '/login');

Route::view('/register', 'auth.register')->name('register');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/task/store/', [TasksController::class, 'store'])->name('task.store');
    Route::post('/task/store/weekly', [TasksController::class, 'storeWeekly'])->name('task.weeklyStore');
    Route::post('/task/store/delete', [TasksController::class, 'destroy'])->name('task.delete');
    Route::post('/task/store/weeklyDelete', [TasksController::class, 'destroyWeekly'])->name('task.weeklyDelete');
    Route::post('/task/store/toggle_completed/{id}', [TasksController::class, 'toggle_completed'])->name('task.toggle_completed');



    Route::get('/task/index', [TasksController::class, 'index'])->name('tasks.index');
});

