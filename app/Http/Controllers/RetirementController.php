<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TypeRetirement;
use App\Models\Retirement;
use Illuminate\Support\Facades\Auth;

use App\Imports\UsersImport;
use App\Imports\CollabolatorsImport;
use App\Models\Boss;
use App\Models\Collaborator;
use App\Models\Position;
use Maatwebsite\Excel\Facades\Excel;
use Validator;

class RetirementController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        // $this->middleware('can:boss.index');
    }

    public function  index()
    {
        $usuario =Auth::user()->email;
        $jefe = Boss::where('email',$usuario)->first();
        $jefe_id = $jefe->email;
        $positions = Position::paginate();
        $type_retirements = TypeRetirement::paginate();
        return view('boss.retirement.storeretiros',compact('type_retirements','positions','jefe_id'));
    }
    

    

    public function create(Request $request){

        $validator = Validator::make($request->all(), [
            'document_collaborator'=> 'required|max:255',
            'name_collaborator'=> 'required|max:255',
            'type_retirement_id'=> 'required|max:255',
            'performance'=> 'required|max:255',
            'last_day'=> 'required|max:255',
            'money_pend'=> 'required|max:255',
            'money_conc'=> 'required|max:255',
            'money_amou'=> 'required|max:255',
            'date_1'=> 'required|max:255',
            'date_2'=> 'required|max:255',
            'date_3'=> 'required|max:255',
            'date_4'=> 'required|max:255',
            'date_5'=> 'required|max:255',
            'date_d_1'=> 'required|max:255',
            'date_d_2'=> 'required|max:255',
            'date_d_3'=> 'required|max:255',
            'date_d_4'=> 'required|max:255',
            'date_d_5'=> 'required|max:255',
            'letter'=> 'required|max:255',
            'delivery_certificate'=> 'required|max:255',
            'admin_ent'=> 'max:255',
            'store_ent'=> 'max:255',
            'cedi_ent'=> 'max:255',
            'reason'=> 'required|max:255',
            'reason_performance'=> 'required|max:255',
            'dir_certificate'=> 'max:255',
            'dir_letter'=> 'max:255',
        ]);
        if($validator->fails()){
 
            return back()->with('error',$validator->errors()->first());
        }

        $retiro = new Retirement();
        $retiro->user_id=Auth::user()->name;

        $colaborador = Collaborator::where('id',$request->collaborator_id)->first();
        $colaborador->state = "0";
        $colaborador->save();

        $retiro->collaborator_id=$request->collaborator_id;
        $retiro->document_collaborator=$request->document_collaborator;
        $retiro->name_collaborator=$request->name_collaborator;

        $retiro->performance=$request->performance;
        $retiro->type_retirement_id=$request->type_retirement_id;
        $retiro->last_day=$request->last_day;

        $retiro->reason=$request->reason;
        $retiro->reason_performance=$request->reason_performance;
        

        $retiro->money_pend=$request->money_pend;
        $retiro->money_amou=$request->money_amou;
        $retiro->money_conc=$request->money_conc;

        $retiro->date_1= $request->date_1 == '2000-01-01' ? '':$request->date_1 ;
        $retiro->date_2= $request->date_2 == '2000-01-01' ? '':$request->date_2 ;
        $retiro->date_3= $request->date_3 == '2000-01-01' ? '':$request->date_3 ;
        $retiro->date_4= $request->date_4 == '2000-01-01' ? '':$request->date_4 ;
        $retiro->date_5= $request->date_5 == '2000-01-01' ? '':$request->date_5 ;
     
        $retiro->date_d_1= $request->date_d_1 == '2000-01-01' ? '':$request->date_d_1 ;
        $retiro->date_d_2= $request->date_d_2 == '2000-01-01' ? '':$request->date_d_2 ;
        $retiro->date_d_3= $request->date_d_3 == '2000-01-01' ? '':$request->date_d_3 ;
        $retiro->date_d_4= $request->date_d_4 == '2000-01-01' ? '':$request->date_d_4 ;
        $retiro->date_d_5= $request->date_d_5 == '2000-01-01' ? '':$request->date_d_5 ;
    

        $retiro->admin_ent=$request->ad_carnet." " .$request->ad_tokens." " .$request->ad_pc." " .$request->ad_ninguno;
        $retiro->store_ent=$request->ti_jean." " .$request->ti_camisa. " " .$request->ti_gafete." " .$request->ti_token." " . $request->ti_carnet." " . $request->ti_canguro. " " .$request->ti_ninguno;
        $retiro->cedi_ent=$request->cedi_jean." " .$request->cedi_camisa." " .$request->cedi_botas." " .$request->cedi_terminal." " .$request->cedi_token." " .$request->cedi_carnet." " .$request->cedi_chaqueta." " .$request->cedi_canguro." " .$request->cedi_cofia." " .$request->cedi_ninguno;

        $retiro->letter=$request->letter;
        $retiro->delivery_certificate=$request->delivery_certificate;


        if($request->dir_letter != null){
            $request->file('dir_letter')->store('public');
            $retiro->dir_letter=$request->file('dir_letter')->store('public');
        }else{
            $retiro->dir_letter="No";
        }

        if($request->dir_certificate != null){
            $request->file('dir_certificate')->store('public');
            $retiro->dir_certificate=$request->file('dir_certificate')->store('public');
        }
        else{
            $retiro->dir_certificate="No";
        }
        $retiro->save();
        $colaborador->state = "0";
        $colaborador->save();
        return back()->with('message','Se a realizado el retiro de '.$retiro->name_collaborator.' satisfactoriamente');
    }
}
