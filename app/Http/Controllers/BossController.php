<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Collaborator;
use App\Models\Position;
use Illuminate\Support\Facades\Auth;

class BossController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:boss.index');
        
    }
    public function index()
    {
        return view('boss.index');
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
        $collaborators = Collaborator::where('document',$request->document)->firts(); 
        $name = $collaborators->name;
        return response()->json(['name' => $name]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
