<?php

namespace App\Http\Controllers;

use App\Models\Cv;
use App\Models\Vacant;
use Illuminate\Http\Request;

class VacantController extends Controller
{
   
    public function index(){
        $vacants = Vacant::paginate(10);
        $cvs = Cv::all();
        return view('admin.vacants',compact('vacants','cvs'));
    }
    public function index2(){
        $vacants = Vacant::paginate(10);
        return view('admin.vacants',compact('vacants'));
    }
    public function store(Request $request){
        $vacant = new Vacant();
        $vacant->title = $request->title;
        $vacant->city = $request->city;
        $vacant->description = $request->description;
        $vacant->salary = $request->salary;
        $vacant->experience = $request->experience;
        $vacant->num_vacants = $request->num_vacants;
        $vacant->state = 1;   
        $vacant-> num_aplic=0;
        $vacant->save();
        return back()->with('message','Se ha creado la vacante correctamente');
    }
    public function edit($id, Request $request){
        $vacant =  Vacant::where('id',$id)->first();
        $vacant->title = $request->title;
        $vacant->city = $request->city;
        $vacant->description = $request->description;
        $vacant->salary = $request->salary;
        $vacant->experience = $request->experience;
        $vacant->num_vacants = $request->num_vacants;
        $vacant->state = 1;   
        $vacant->save();
        return back()->with('message','Se ha editado la vacante correctamente');
    }
    
}
