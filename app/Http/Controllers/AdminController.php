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
        $tiendas = Cdc::all();
        return view('admin.tiendas',compact('jefes','tiendas'));
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
        Excel::import(new BossImport, $file);
        Excel::import(new UsersImport, $file);
        

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