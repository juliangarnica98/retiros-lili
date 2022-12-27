<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Collaborator;
use App\Models\Position;
use Illuminate\Support\Facades\Auth;
use App\Models\Retirement;
use Illuminate\Pagination\Paginator;

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
        
        $retiros = Retirement::where('user_id',auth()->id())->paginate(7);
        return view('boss.index',compact('retiros'));
    }
   
    public function create()
    {
     }


    public function store(Request $request)
    {
        //
    }


    public function show()
    {
        $positions = Position::all();
        Paginator::useBootstrap();
        $user = Auth::user()->id-1;
        // dd($user);
        $collaborators = Collaborator::where('state','1')->where('user_id',$user)->paginate(20);
        
        return view('boss.collaborator',compact('collaborators','positions','user'));
    }

    public function edit($id)
    {
        
    }
    public function busqueda(Request $request){
        
        $collaborator = Collaborator::where('document',$request->document)->where('state',1)->first(); 
        
        if($collaborator){
            $id = $collaborator->id;
            $name = $collaborator->name;
            $position = $collaborator->position_id;
            return response()->json(['name' => $name,'id'=>$id,'position'=>$position]);
        }
        return response()->json(['name' => "",'id'=>"",'position'=>""]);
        
       
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
