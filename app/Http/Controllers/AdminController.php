<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Area;
use App\Models\Position;
use App\Models\TypeRetirement;
use Illuminate\Support\Facades\Validator;

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
        return view('admin.tableretiros');
    }
    public function importar()
    {
        return view('admin.importar');
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


    public function creararea(Request $request){
        $validator = Validator::make($request->all(), [
            'description' => 'required|unique:areas'
        ]);
        
        if($validator->fails()){
            return back();
        }
        $area = new Area();
        $area->description = $request->description;
        $area->save();
        return back();
    }

    public function crearcargo(Request $request){
        $validator = Validator::make($request->all(), [
            'area_id'=>'required',
            'description' => 'required|unique:positions'
        ]);
        
        if($validator->fails()){
            return back();
        }
        $position = new Position();
        $position->description = $request->description;
        $position->area_id = $request->area_id;
        $position->save();
        return back();
    }

    public function creartiporetiro(Request $request){
        $validator = Validator::make($request->all(), [
            'description' => 'required|unique:type_retirements'
        ]);
        
        if($validator->fails()){
            return back();
        }
        $tiporetiro = new TypeRetirement();
        $tiporetiro->description = $request->description;
        $tiporetiro->save();
        return back();
    }
}
