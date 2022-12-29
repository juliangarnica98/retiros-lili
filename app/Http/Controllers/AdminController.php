<?php

namespace App\Http\Controllers;

use App\Exports\RetirementExport;
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
use App\Models\User;
use Maatwebsite\Excel\Facades\Excel;
use PhpParser\Node\Stmt\Foreach_;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:admin.index');
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        Paginator::useBootstrap();
        $tipo_retiro= TypeRetirement::all();
        $retiros = Retirement::paginate(7);
        $users = User::paginate();
        return view('admin.tableretiros',compact('retiros','users','tipo_retiro'));
    }
    // public function tiendas()
    // {
    //     Paginator::useBootstrap();
    //     $jefes = Boss::all();
    //     $jefe = Boss::where('id','!=',null)->first();
    //     // dd($jefe);
    //     $tiendas = Cdc::all();
    //     // dd($jefes);
    //     return view('admin.tiendas',compact('jefes','tiendas','jefe'));
    // }
    public function importar()
    {
        return view('admin.importar');
    }
    public function importar2()
    {
        $jefes = User::role('Jefe')->get();
        // $cdc = Cdc::where('boss_id',"")->first();
        // dd($jefes);
        return view('admin.import',compact('jefes'));
    }
    public function areas()
    {
        $areas = Area::paginate();
        return view('admin.area',compact('areas'));
    }
    public function cargos()
    {
        $areas = Area::paginate();
        $cargos = Position::paginate();
        return view('admin.cargo',compact('areas','cargos'));
    }
    public function tiporetiro()
    {   
        $tiporetiros = TypeRetirement::paginate();
        return view('admin.tiporetiro',compact('tiporetiros'));
    }

    // public function creartiporetiro(Request $request){
    //     $validator = Validator::make($request->all(), [
    //         'description' => 'required|unique:type_retirements'
    //     ]);
        
    //     if($validator->fails()){
    //         return back();
    //     }
    //     $tiporetiro = new TypeRetirement();
    //     $tiporetiro->description = $request->description;
    //     $tiporetiro->save();
    //     return back();
    // }

    public function busqueda(Request $request){
        
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

    public function asignarCdc(Request $request){
        
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
            $file->store('importJefe');;
        
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
        try {
            Excel::import(new UsersImport, $file);
            Excel::import(new BossImport, $file);
        } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
        
            $failures = $e->failures();
        
            foreach ($failures as $failure) {
                $failure->row(); // row that went wrong
                $failure->attribute(); // either heading key (if using heading row concern) or column index
                $failure->errors(); // Actual error messages from Laravel validator
                $failure->values(); // The values of the row that has failed.
            }
            return back()->withFailures('error',$failures);
        }
        return back()->with('message','importancion de usuarios completa');
    }

    public function importCollaborator(Request $request)
    {
        $file = $request->file('file');
        if($file == null){
            return back()->with('error','Seleccione un archivo');
        } 
        $file->store('import');
        $validator = Validator::make($request->all(), [
            'file*' => 'required|mimes:xlsx'
        ]);
        if($validator->fails()){
            return back()->with('error','Seleccione un archivo valido');
        }
        Excel::import(new CollabolatorsImport($request->jefe), $file);
        return back()->with('message','Importancion de usuarios completa');
    }
    public function export() 
    {   
        return Excel::download(new RetirementsExport, 'retirements.xlsx');
    }
    
}
