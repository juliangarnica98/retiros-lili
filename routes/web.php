<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

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
    return redirect('/login');

});

Route::get('/home', function () {  
    if(Auth::user()->id==1){
        return redirect()->route('admin.index');
    }else if(Auth::user()->id!=1){
        return redirect()->route('boss.index');
    }
});

Auth::routes(["register" => false]);

Route::group(['prefix' => 'administrador'], function() {
    Route::get('index', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.index');
    Route::get('importar', [App\Http\Controllers\AdminController::class, 'importar'])->name('admin.importar');
    Route::get('areas', [App\Http\Controllers\AdminController::class, 'areas'])->name('admin.areas');
    Route::get('cargos', [App\Http\Controllers\AdminController::class, 'cargos'])->name('admin.cargos');
    Route::get('tiporetiro', [App\Http\Controllers\AdminController::class, 'tiporetiro'])->name('admin.tiporetiro');
    Route::post('creararea', [App\Http\Controllers\AdminController::class, 'creararea'])->name('admin.creararea');
    Route::post('crearcargo', [App\Http\Controllers\AdminController::class, 'crearcargo'])->name('admin.crearcargo');
    Route::post('creartiporetiro', [App\Http\Controllers\AdminController::class, 'creartiporetiro'])->name('admin.creartiporetiro');
    
    Route::post('admin-import-excel', [App\Http\Controllers\RetirementController::class, 'importExcel'])->name('admin.import.excel');
});

Route::group(['prefix' => 'jefe'], function() {
    Route::get('index', [App\Http\Controllers\BossController::class,'index'])->name('boss.index');
    Route::get('colaboradores', [App\Http\Controllers\BossController::class,'show'])->name('boss.show');
    Route::get('retiros', [App\Http\Controllers\RetirementController::class, 'index'])->name('retirement.index');
    Route::get('importar', [App\Http\Controllers\RetirementController::class, 'importar'])->name('retirement.importar');
    Route::post('busqueda', [App\Http\Controllers\BossController::class, 'busqueda'])->name('boss.search');
    Route::post('admin-import-colaborator', [App\Http\Controllers\RetirementController::class, 'importCollaborator'])->name('admin.import.collaborator');
});









// Route::get('/retiro', [App\Http\Controllers\RetiroController::class, 'index'])->name('retiro');
// Route::get('/administrador', function () { return view('layouts.admin');});
// Route::post('/import-excel', [App\Http\Controllers\RetirementController::class, 'importExcel'])->name('import.excel');
