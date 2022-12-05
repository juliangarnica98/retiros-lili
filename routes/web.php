<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers;
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

Route::get('/', function () {  return  redirect('/login');});

Auth::routes(["register" => false]);

Route::get('administrador', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.index');

Route::resource('boss', App\Http\Controllers\BossController::class)->only('index','show');

Route::get('retiros', [App\Http\Controllers\RetirementController::class, 'index'])->name('retirement.index');

Route::post('admin-import-excel', [App\Http\Controllers\RetirementController::class, 'importExcel'])->name('admin.import.excel');


// Route::get('/retiro', [App\Http\Controllers\RetiroController::class, 'index'])->name('retiro');
// Route::get('/administrador', function () { return view('layouts.admin');});
// Route::post('/import-excel', [App\Http\Controllers\RetirementController::class, 'importExcel'])->name('import.excel');
