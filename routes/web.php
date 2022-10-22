<?php

use App\Http\Controllers\EmployeeController;
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

Route::get('dashboard', KaryawanComponent::class);