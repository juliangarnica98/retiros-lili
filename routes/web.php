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
    return redirect()->route('home.index');
});

Route::get('/home', function () {  
    if(Auth::user()->id==1){
        return redirect()->route('admin.index');
    }else if(Auth::user()->id!=1){
        return redirect()->route('boss.index');
    }
});

Auth::routes(["register" => false]);

Route::group(['prefix' => 'intranet'], function() {
    Route::get('inicio', [App\Http\Controllers\HomeController::class, 'index'])->name('home.index');
    Route::get('nosotros', [App\Http\Controllers\HomeController::class, 'nosotros'])->name('home.nosotros');
});

Route::group(['prefix' => 'administrador'], function() {
    Route::get('index', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.index');
    Route::get('importar', [App\Http\Controllers\AdminController::class, 'importar'])->name('admin.importar');
    Route::post('admin-import-colaborator', [App\Http\Controllers\AdminController::class, 'importCollaborator'])->name('admin.import.collaborator');
    Route::post('admin-import-excel', [App\Http\Controllers\AdminController::class, 'importExcel'])->name('admin.import.excel');
    Route::post('busqueda-cdc', [App\Http\Controllers\AdminController::class, 'busqueda'])->name('admin.search');
    Route::post('asignar-cdc', [App\Http\Controllers\AdminController::class, 'asignarCdc'])->name('admin.asignar');
    Route::get('exporttable', [App\Http\Controllers\AdminController::class, 'export'])->name('admin.export.excel');
});

  
Route::group(['prefix' => 'jefe'], function() 
{
    Route::get('exporttable/{id}', [App\Http\Controllers\BossController::class, 'export'])->name('boss.export.excel');
    Route::get('index', [App\Http\Controllers\BossController::class,'index'])->name('boss.index');
    Route::get('colaboradores', [App\Http\Controllers\BossController::class,'show'])->name('boss.show');
    Route::get('colaborador', [App\Http\Controllers\BossController::class,'search'])->name('boss.busqueda');
    Route::get('retiros', [App\Http\Controllers\RetirementController::class, 'index'])->name('retirement.index');
    Route::post('create', [App\Http\Controllers\RetirementController::class, 'create'])->name('boss.create');
    Route::post('busqueda', [App\Http\Controllers\BossController::class, 'busqueda'])->name('boss.search');
});



