<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () { return view('welcome');});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/retiro', [App\Http\Controllers\RetiroController::class, 'index'])->name('retiro');

Route::get('/administrador', function () { return view('layouts.admin');});

Route::post('/import-excel', [App\Http\Controllers\AreaManagerController::class, 'importExcel'])->name('import.excel');
