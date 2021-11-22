<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SellerApplicationController;

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
Route::get('success', [SellerApplicationController::class, 'success'])->name('success');
Route::resource('application', SellerApplicationController::class);
Route::redirect('/', 'application');
