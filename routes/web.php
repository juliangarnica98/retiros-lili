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

// Route::get('/', function () {  
//     return redirect('/login');

// });

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home.index');

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
    // Route::get('tiendas', [App\Http\Controllers\AdminController::class, 'tiendas'])->name('tiendas.index');
    Route::get('importar', [App\Http\Controllers\AdminController::class, 'importar'])->name('admin.importar');
    Route::get('importar-colaboradores', [App\Http\Controllers\AdminController::class, 'importar2'])->name('admin.importar2');
    Route::get('areas', [App\Http\Controllers\AdminController::class, 'areas'])->name('admin.areas');
    Route::get('cargos', [App\Http\Controllers\AdminController::class, 'cargos'])->name('admin.cargos');
    Route::get('tiporetiro', [App\Http\Controllers\AdminController::class, 'tiporetiro'])->name('admin.tiporetiro');
    Route::post('creararea', [App\Http\Controllers\AdminController::class, 'creararea'])->name('admin.creararea');
    Route::post('crearcargo', [App\Http\Controllers\AdminController::class, 'crearcargo'])->name('admin.crearcargo');
    Route::post('creartiporetiro', [App\Http\Controllers\AdminController::class, 'creartiporetiro'])->name('admin.creartiporetiro');
    Route::post('admin-import-colaborator', [App\Http\Controllers\AdminController::class, 'importCollaborator'])->name('admin.import.collaborator');
    Route::post('admin-import-excel', [App\Http\Controllers\AdminController::class, 'importExcel'])->name('admin.import.excel');
    
    Route::post('busqueda-cdc', [App\Http\Controllers\AdminController::class, 'busqueda'])->name('admin.search');
    Route::post('asignar-cdc', [App\Http\Controllers\AdminController::class, 'asignarCdc'])->name('admin.asignar');

    Route::get('exporttable', [App\Http\Controllers\AdminController::class, 'export'])->name('admin.export.excel');

});

Route::group(['prefix' => 'jefe'], function() {

    Route::get('exporttable/{id}', [App\Http\Controllers\BossController::class, 'export'])->name('boss.export.excel');

    Route::get('index', [App\Http\Controllers\BossController::class,'index'])->name('boss.index');
    Route::get('colaboradores', [App\Http\Controllers\BossController::class,'show'])->name('boss.show');
    Route::get('retiros', [App\Http\Controllers\RetirementController::class, 'index'])->name('retirement.index');
    Route::post('create', [App\Http\Controllers\RetirementController::class, 'create'])->name('boss.create');
    Route::post('busqueda', [App\Http\Controllers\BossController::class, 'busqueda'])->name('boss.search');
});


// Route::get('/retiro', [App\Http\Controllers\RetiroController::class, 'index'])->name('retiro');
// Route::get('/administrador', function () { return view('layouts.admin');});
// Route::post('/import-excel', [App\Http\Controllers\RetirementController::class, 'importExcel'])->name('import.excel');
