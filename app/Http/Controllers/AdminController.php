<?php

namespace App\Http\Controllers;

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
        $retiros = Retirement::paginate(7);
        return view('admin.tableretiros',compact('retiros'));
    }
    public function tiendas()
    {
        Paginator::useBootstrap();
        $jefes = Boss::all();
        $jefe = Boss::where('id',1)->first();
        $tiendas = Cdc::all();
        // dd($jefes);
        return view('admin.tiendas',compact('jefes','tiendas','jefe'));
    }
    public function importar()
    {
        return view('admin.importar');
    }
    public function importar2()
    {
        $jefes = User::role('Jefe')->get();
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
        // dd($request->jefe);
        $boss = Boss::where('id',$request->jefe)->first();
        if($boss){
            $tiendas = Cdc::where('regional_id',$boss->regional_id)
            ->Where('boss_id', $boss->id)
            // ->Where('boss_id',"")
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
                $c->save();
            }
        }
        if($cdcs){
            foreach ($cdcs as $cdc ) {
                $cdd = Cdc::where('id',$cdc)->first();         
                $cdd->boss_id =  $request->jefe;
                $cdd->save();
            }
        }
        
        
        return back()->with('message','Jefes asigandos correctamente');
    }
    public function importExcel(Request $request)
    {
        $file = $request->file('file');
        if($file == null){
            return back()->with('error','Seleccione un archivo');
        } 
        $validator = Validator::make($request->all(), [
            'file*' => 'required|mimes:xlsx'
        ]);
        
        if($validator->fails()){
            return back()->with('error','Seleccione un archivo valido');
        }
        Excel::import(new UsersImport, $file);
        Excel::import(new BossImport, $file);
        
        

        return back()->with('message','importancion de usuarios completa');
    }

    public function importCollaborator(Request $request)
    {
        $file = $request->file('file');
        if($file == null){
            return back()->with('error','Seleccione un archivo');
        } 
        $validator = Validator::make($request->all(), [
            'file*' => 'required|mimes:xlsx'
        ]);
        if($validator->fails()){
            return back()->with('error','Seleccione un archivo valido');
        }
        Excel::import(new CollabolatorsImport($request->jefe), $file);

        return back()->with('message','Importancion de usuarios completa');
    }
}
