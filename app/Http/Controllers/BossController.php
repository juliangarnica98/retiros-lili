<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Collaborator;
use App\Models\Position;
use Illuminate\Support\Facades\Auth;
use App\Models\Retirement;

class BossController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:boss.index');
        
    }
    public function index()
    {
        $retiros = Retirement::paginate();
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
        $collaborators = Collaborator::where('state','1')->where('user_id',Auth::user()->id)->paginate();
        return view('boss.collaborator',compact('collaborators','positions'));
    }

    public function edit($id)
    {
        
    }
    public function busqueda(Request $request){
        
        $collaborator = Collaborator::where('document',$request->document)->first(); 
        $id = $collaborator->id;
        $name = $collaborator->name;
        if(empty($name)){
            return response()->json(null);
        }
        return response()->json(['name' => $name,'id'=>$id]);
       
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
