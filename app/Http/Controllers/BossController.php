<?php

namespace App\Http\Controllers;

use App\Exports\RetirementExport;
use App\Models\Boss;
use Illuminate\Http\Request;
use App\Models\Collaborator;
use App\Models\Position;
use Illuminate\Support\Facades\Auth;
use App\Models\Retirement;
use App\Models\TypeRetirement;
use Illuminate\Pagination\Paginator;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\UsersExport;
use Illuminate\Support\Facades\DB;

class BossController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:boss.index');
        
    }
    public function index()
    {
        Paginator::useBootstrap();
        $tipo_retiro= TypeRetirement::all();
        $retiros = Retirement::where('user_id',auth()->user()->name)->paginate(7);
        $usuario = auth()->id();
        return view('boss.retirement.indexretiros',compact('retiros','tipo_retiro','usuario'));
    }
   
    public function create()
    {
    }

    public function store(Request $request)
    {
    }

    
    public function show()
    {
        
        Paginator::useBootstrap();
        $positions = Position::all();
        $user = Auth::user()->name;
        $boss = Boss::where('name',$user)->first();
        $collaborators = Collaborator::where('state','1')
            ->where('user_id1',$boss->email)
            ->orWhere('user_id2',$boss->email)
            ->orWhere('user_id3',$boss->email)
            ->orWhere('user_id4',$boss->email)
            ->orWhere('user_id5',$boss->email)
            ->orWhere('user_id6',$boss->email)
            ->orWhere('user_id7',$boss->email)
            ->paginate(20);
        
        return view('boss.collaborator.indexcolaboradores',compact('collaborators','positions'));
    }

    public function search(Request $request)
    {   
        if($request->busqueda==''){
            return redirect()->route('boss.show');
        }
 
        Paginator::useBootstrap();
        $busqueda=trim($request->busqueda);
        $positions = Position::all();
        $user = Auth::user()->email;
        $user_name=Auth::user()->name;
        $name_jefe=Collaborator::where('name',$user_name)->first(); 

        // dd($name_jefe);
        
        if($name_jefe->area=='ADMINISTRATIVO'){
            $collaborators = Collaborator::where('state','1')
            ->where('area','ADMINISTRATIVO')
            ->where('user_id1',$user)
            ->where('name','LIKE','%'.$busqueda.'%')
            ->orWhere('document','LIKE','%'.$busqueda.'%')
            ->paginate();
            
        }elseif($name_jefe->area=='COMERCIAL'){
            $collaborators = Collaborator::where('state','1')
            ->where('area','COMERCIAL')
            ->where('user_id1',$user)
            ->where('name','LIKE','%'.$busqueda.'%')
            ->orWhere('document','LIKE','%'.$busqueda.'%')
            ->paginate();
           
        }elseif ($name_jefe->area=='CEDI') {
            $collaborators = Collaborator::where('state','1')
            ->where('area','CEDI')
            ->where('user_id1',$user)
            ->orWhere('user_id2',$user)
            ->orWhere('user_id3',$user)
            ->orWhere('user_id4',$user)
            ->orWhere('user_id5',$user)
            ->orWhere('user_id6',$user)
            ->orWhere('user_id7',$user)
            ->where('name','LIKE','%'.$busqueda.'%')
            ->orWhere('document','LIKE','%'.$busqueda.'%')
            ->paginate();
        }else{
            $collaborators = Collaborator::where('state','1')
            ->where('user_id1',$user)
            ->where('name','LIKE','%'.$busqueda.'%')
            ->orWhere('document','LIKE','%'.$busqueda.'%')
            ->paginate();
        }
        
     
        return view('boss.collaborator.indexcolaboradores',compact('collaborators','positions'));
    }

    public function edit($id)
    {
        
    }
    public function busqueda(Request $request){
        
        $jefe_id=$request->jefe_id;
        $collaborator = Collaborator::where('document',$request->document)->where('state',1)->first(); 
        $collaborator2 = Collaborator::where('document',$request->document)->where('state',0)->first();
   
        if($collaborator2){
            return response()->json(['name' => "",'id'=>"",'position'=>""]);
        }
        
        
        if($collaborator){
            if($jefe_id == $collaborator->user_id1 OR $jefe_id == $collaborator->user_id2 OR $jefe_id == $collaborator->user_id3
            OR $jefe_id == $collaborator->user_id4 OR $jefe_id == $collaborator->user_id5 OR $jefe_id == $collaborator->user_id6
            OR $jefe_id == $collaborator->user_id7){
                $id = $collaborator->id;
                $name = $collaborator->name;
                $regional = $collaborator->area;
                return response()->json(['name' => $name,'id'=>$id,'position'=>$regional]);                
            }else{
                return response()->json(['name' => "",'id'=>"",'position'=>""]);
            }
            
        }
        return response()->json(['name' => "",'id'=>"",'position'=>""]);
    }


    public function export(Request $request) 
    {   
        return Excel::download(new RetirementExport($request->id), 'retirement.xlsx');
        return back()->with('message','Exportación completa');
    }
}
