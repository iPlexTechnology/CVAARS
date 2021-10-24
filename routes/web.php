<?php

use App\Http\Controllers\CitizenRecordController;
use App\Http\Controllers\VaccineAllocationController;
use App\Http\Controllers\VaccineBatchController;
use App\Http\Controllers\VaccineTypeController;
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

Route::redirect('/', '/en');

Route::group(['middleware' => 'auth'], function () {
    Route::view('dashboard', 'dashboard')->name('home');
    Route::resource('vaccine-types', VaccineTypeController::class);
    Route::resource('vaccine-batches', VaccineBatchController::class);
    Route::resource('vaccine-allocations', VaccineAllocationController::class);
});

Route::group(['prefix' => '{language}'], function () {
    Route::get('/', function () {
        return view('welcome');
    })->name('welcome');
    Route::resource('/register_for_vaccination', CitizenRecordController::class);
});
