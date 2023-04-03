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

// Route::get('/home', function () {  
//     if(Auth::user()->id==1){
//         return redirect()->route('admin.index');
//     }else if(Auth::user()->id!=1){
//         return redirect()->route('boss.index');
//     }
// });

Auth::routes(["register" => false]);

Route::group(['prefix' => 'intranet'], function() {
    Route::get('inicio', [App\Http\Controllers\HomeController::class, 'index'])->name('home.index');
    Route::get('nosotros', [App\Http\Controllers\HomeController::class, 'nosotros'])->name('home.nosotros');
    Route::get('cultura-organizacional', [App\Http\Controllers\HomeController::class, 'cultura'])->name('home.cultura');
    Route::get('lili-enterate', [App\Http\Controllers\HomeController::class, 'enterate'])->name('home.enterate');
    Route::get('lili-enterate/cumpleaños', [App\Http\Controllers\HomeController::class, 'cumpleanos'])->name('home.cumpleaños');
    Route::get('lili-enterate/novedades', [App\Http\Controllers\HomeController::class, 'novedad'])->name('home.novedad');
    Route::get('lili-enterate/nuevos-colaboradores', [App\Http\Controllers\HomeController::class, 'colaborador'])->name('home.colaborador');
    Route::get('lili-enterate/convocatorias-internas', [App\Http\Controllers\HomeController::class, 'convocatoria'])->name('home.convocatoria');
    Route::get('lili-enterate/identidad-corporativa', [App\Http\Controllers\HomeController::class, 'identidad'])->name('home.identidad');
    Route::get('directorio/directorio-administrativo', [App\Http\Controllers\HomeController::class, 'administrativo'])->name('home.administrativo');
    Route::get('directorio/directorio-comercial', [App\Http\Controllers\HomeController::class, 'comercial'])->name('home.comercial');
    Route::get('enyoi-con-lili/administrativo', [App\Http\Controllers\HomeController::class, 'enyoiadministrativo'])->name('home.enyoiadministrativo');
    Route::get('enyoi-con-lili/cedi', [App\Http\Controllers\HomeController::class, 'enyoicedi'])->name('home.enyoicedi');
    Route::get('enyoi-con-lili/comercial', [App\Http\Controllers\HomeController::class, 'enyoicomercial'])->name('home.enyoicomercial');
    Route::get('enyoi-con-lili/solicitud-de-permisos', [App\Http\Controllers\HomeController::class, 'enyoipermisos'])->name('home.enyoipermisos');
    Route::get('enyoi-con-lili/solicitud-de-préstamo', [App\Http\Controllers\HomeController::class, 'enyoiprestamos'])->name('home.enyoiprestamos');
    Route::get('enyoi-con-lili/política-de-bienestar', [App\Http\Controllers\HomeController::class, 'enyoibienestar'])->name('home.enyoibienestar');
    Route::get('directorio/directorio-administrativo/gerencia-gestión-humana', [App\Http\Controllers\HomeController::class, 'gestionhumana'])->name('home.ggestionhumana');
    Route::get('directorio/directorio-administrativo/gerencia-comercial', [App\Http\Controllers\HomeController::class, 'gcomercial'])->name('home.gcomercial');
    Route::get('directorio/directorio-administrativo/gerencia-de-expansión-y-visual', [App\Http\Controllers\HomeController::class, 'expansionyvisual'])->name('home.gexpansionyvisual');
    Route::get('directorio/directorio-administrativo/gerencia-de-mercadeo-y-producto', [App\Http\Controllers\HomeController::class, 'mercadeo'])->name('home.gmercadeo');
    Route::get('directorio/directorio-administrativo/gerencia-de-operaciones', [App\Http\Controllers\HomeController::class, 'operaciones'])->name('home.goperaciones');
    Route::get('directorio/directorio-administrativo/gerencia-financiera', [App\Http\Controllers\HomeController::class, 'financiera'])->name('home.gfinanciera');
    Route::get('directorio/directorio-administrativo/dirección-jurídica', [App\Http\Controllers\HomeController::class, 'juridica'])->name('home.djuridica');
    Route::get('directorio/directorio-administrativo/uniq-condoms', [App\Http\Controllers\HomeController::class, 'uniq'])->name('home.uniq');
    Route::get('políticas-y-procesos/gerencia-de-gestión-humana', [App\Http\Controllers\HomeController::class, 'poli_gerencia_gestion_humana'])->name('home.poli_gerencia_gestion_humana');
    Route::get('fundación-los-sueños-de-lili', [App\Http\Controllers\HomeController::class, 'fundacion'])->name('home.fundacion');
});

Route::group(['prefix' => 'administrador'], function() {
    Route::get('index', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.index');
    Route::get('jefes', [App\Http\Controllers\AdminController::class, 'indexjefes'])->name('admin.jefes');
    Route::get('colaboradores', [App\Http\Controllers\AdminController::class, 'indexcolaboradores'])->name('admin.colaboradores');
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
Route::group(['prefix' => 'comunicador'], function() 
{
    Route::get('index', [App\Http\Controllers\CommunicatorController::class,'index'])->name('communicator.index');
});



