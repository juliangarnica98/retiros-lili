<?php

namespace App\Http\Controllers;

use App\Exports\RetirementsExport;
use Illuminate\Http\Request;
use App\Models\Area;
use App\Models\Position;
use App\Models\Retirement;
use App\Models\TypeRetirement;
use Illuminate\Support\Facades\Validator;
use Illuminate\Pagination\Paginator;

use App\Imports\UsersImport;
use App\Imports\BossImport;
use App\Imports\CollabolatorsImport;
use App\Models\Boss;
use App\Models\Cdc;
use App\Models\Collaborator;
use App\Models\Cv;
use App\Models\File;
use App\Models\State;
use App\Models\User;
use App\Models\Vacant;
use ErrorException;
use Exception;
use Illuminate\Database\QueryException;
use Maatwebsite\Excel\Facades\Excel;


class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:admin.index');    
    }
    public function index()
    {

        Paginator::useBootstrap();
        $tipo_retiro= TypeRetirement::all();
        $retiros = Retirement::paginate(7);
        $users = User::paginate();
       
        return view('admin.retirement.indexretiros',compact('retiros','users','tipo_retiro'));
    }

    public function indexjefes()
    {
        Paginator::useBootstrap();
        $jefes = Boss::paginate(15);
        return view('admin.boss.indexjefes',compact('jefes'));
    }

    public function indexcolaboradores(){
        Paginator::useBootstrap();
        $collaborators = Collaborator::paginate(10);
        $jefes = Boss::get();
        $cargos = Position::get();
        return view('admin.collaborators.indexcolaboradores',compact('collaborators','jefes','cargos'));
    }

    public function importar2()
    {
        $jefes = User::role('Jefe')->get();

        return view('admin.import.importColaborador',compact('jefes'));
    }

    public function busqueda(Request $request)
    {
        
        $boss = Boss::where('id',$request->jefe)->first();
        
        if($boss){
            $tiendas = Cdc::where('regional_id',$boss->regional_id)
            ->whereIn('boss_id',["",$request->jefe])
            ->get(); 
        }   
        if($request->jefe==""){
            return 1;
        }
        return json_encode($tiendas);
    }
    
    public function asignarCdc(Request $request)
    {   
        $cdcs=$request->options;
        $cdds = Cdc::where('boss_id',$request->jefe)->get();
        if($cdds){
            foreach ($cdds as $c) {
                $c->boss_id = "";
                $colaborator = Collaborator::where('user_id',$request->jefe)->get();
                foreach($colaborator as $col){
                    $col->user_id="";
                    $col->save();
                }
                $c->save();
            }
        }
        if($cdcs){
            foreach ($cdcs as $cdc ) {
                $cdd = Cdc::where('id',$cdc)->first();         
                $cdd->boss_id =  $request->jefe;
                $colaborator = Collaborator::where('regional_id',$cdd->regional_id)->where('centro_d',$cdd->description)->get();
                foreach ($colaborator as $col ) {
                    $col->user_id = $request->jefe;
                    $col->save();
                }
                $cdd->save();
            }
        }        
        return back()->with('message','Jefes asigandos correctamente');
    }
    public function importExcel(Request $request)
    {
        $file = $request->file('file');
        if(!empty($request->file('file'))){
            // $archivo=$file->store('importJefe');
            $files= new File();
            $files->date_jefes=date("d-m-Y h:i:s");
            $files->file_jefe = $file->store('importJefe');
            $files->save();
            $file->store('importJefe');
        
        }
        
        if($file == null){
            return back()->with('error','Seleccione un archivo');
        } 
        $validator = Validator::make($request->all(), [
            'file*' => 'required|mimes:xlsx'
        ]);
        
        if($validator->fails()){
            return back()->with('error','Seleccione un archivo valido');
        }
        // Excel::import(new UsersImport, $file);
        // Excel::import(new BossImport, $file);
        try {
            Excel::import(new UsersImport, $file);
            Excel::import(new BossImport, $file);
        } catch (ErrorException $e) {
            return back()->with('error','No se ha encontrado alguna columna en el archivo');
        }catch (QueryException $x) {
            return back()->with('error','Existen campos obligatorios que están vacios');
        }catch (\Exception $x) {
            return back()->with('error','Existen un error en el archivo');
        }
        return back()->with('message','importancion de usuarios completa');
    }

    public function importCollaborator(Request $request)
    {
        $file = $request->file('file');
        if($file == null){
            return back()->with('error','Seleccione un archivo');
        } 
        
        $files= File::orderBy('id','DESC')->first();
        if($files){
            if($files->date_colaboradores==""){
                $files->date_colaboradores=date("d-m-Y h:i:s");
                $files->file_colaboradores = $file->store('importColaborator');
                $files->save();
            }else{
                return back()->with('error','Actualice la base de datos de jefes activos');
            }
        }else{
            return back()->with('error','Actualice la base de datos de jefes activos');
        }
        
        
        $file->store('importColaborator');
        $validator = Validator::make($request->all(), [
            'file*' => 'required|mimes:xlsx'
        ]);
        if($validator->fails()){
            return back()->with('error','Seleccione un archivo valido');
        }
        // Excel::import(new CollabolatorsImport($request->jefe), $file);
        try {
            Excel::import(new CollabolatorsImport($request->jefe), $file);
        } catch (ErrorException $e) {
            return back()->with('error','No se ha encontrado alguna columna en el archivo');
        }catch (QueryException $x) {
            return back()->with('error','Existen campos obligatorios que están vacios');
        }catch (\Exception $x) {
            return back()->with('error','Existen un error en el archivo');
        }
        
        return back()->with('message','Importancion de usuarios completa');
    }
    
    public function export() 
    {   
        return Excel::download(new RetirementsExport, 'retirements.xlsx');
        return back()->with('message','Exportación completa');
    }
    
}
