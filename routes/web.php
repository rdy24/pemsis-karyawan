<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\LoginController;
use App\Http\Livewire\KaryawanComponent;
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
    return view('index');
});

// Route::get('/dashboard', [EmployeeController::class, 'index'])->name('dashboard');
Route::group(['middleware' => ['auth']], function () {
    Route::get('dashboard', KaryawanComponent::class);
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');
});

Route::group(['middleware' => ['guest']], function () {
    Route::get('login', [LoginController::class, 'index'])->name('login');
    Route::post('login', [LoginController::class, 'login'])->name('login.process');
});
