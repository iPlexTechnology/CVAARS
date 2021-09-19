<?php

use App\Http\Controllers\CitizenRecordController;
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

Route::group(['prefix' => '{language}'], function () {
    Route::get('/', function () {
        return view('welcome');
    })->name('welcome');
    Route::resource('/register_for_vaccination', CitizenRecordController::class);
});

Route::view('home', 'home')->middleware('auth');
