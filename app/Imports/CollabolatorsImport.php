<?php

namespace App\Imports;

use App\Models\Boss;
use App\Models\Cdc;
use App\Models\Collaborator;
use App\Models\Gerencia;
use App\Models\Position;
use App\Models\Regional;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CollabolatorsImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null


    */

    // public function  __construct($jefe)
    // {
    //     $this->jefe = $jefe;
    // }

    public function model(array $row)
    {

    
        if($row['area']=='CEDI'){
            if($row['ceco']=='CEDI YOI' AND $row['jefe']=='LIDERES YOI'){
                $jefes_yoi=Boss::where('centro_costo','CEDI YOI')->get();
                $jefe=[];
              
                for ($i = 0; $i <= count($jefes_yoi)-1; $i++) {
                    $jefe[$i]=$jefes_yoi[$i]->email;
                }
                // dd($jefe);
                $jefe1 =$jefe[0];
                $jefe2 = (isset($jefe[1])) ? $jefe[1] : '';
                $jefe3 = (isset($jefe[2])) ? $jefe[2] : '';
                $jefe4 = (isset($jefe[3])) ? $jefe[3] : '';
                $jefe5 = (isset($jefe[4])) ? $jefe[4] : '';
                $jefe6 = (isset($jefe[5])) ? $jefe[5] : '';
                $jefe7 = (isset($jefe[6])) ? $jefe[6] : '';
           
                return new Collaborator(
                    [
                        'name' => $row['nombre'],
                        'state'=>1, 
                        'document' => $row['documento'],
                        'cargo'=>$row['cargo'],
                        'centro_costo'=>$row['ceco'],
                        'user_id1'=> $jefe1,
                        'user_id2'=> $jefe2,
                        'user_id3'=> $jefe3,
                        'user_id4'=> $jefe4,
                        'user_id5'=> $jefe5,
                        'user_id6'=> $jefe6,
                        'user_id7'=> $jefe7,
                        'area'=>$row['area'],
                        'state_e'=> '1',
                    ]);

            }elseif ($row['ceco']=='CEDI CANAIMA' AND $row['jefe']=='LIDERES CANAIMA') {
                $jefes_canaima=Boss::where('centro_costo','CEDI CANAIMA')->where('cargo','!=','JEFE DE BANDAS')->get();
                $jefe=[];

                for ($i = 0; $i <= count($jefes_canaima)-1; $i++) {
                    $jefe[$i]=$jefes_canaima[$i]->email;
                }
                $jefe1 =$jefe[0];
                $jefe2 = (isset($jefe[1])) ? $jefe[1] : '';
                $jefe3 = (isset($jefe[2])) ? $jefe[2] : '';
                $jefe4 = (isset($jefe[3])) ? $jefe[3] : '';
                $jefe5 = (isset($jefe[4])) ? $jefe[4] : '';
                $jefe6 = (isset($jefe[5])) ? $jefe[5] : '';
                $jefe7 = (isset($jefe[6])) ? $jefe[6] : '';

                return new Collaborator(
                    [
                        'name' => $row['nombre'],
                        'state'=>1, 
                        'document' => $row['documento'],
                        'cargo'=>$row['cargo'],
                        'centro_costo'=>$row['ceco'],
                        'user_id1'=> $jefe1,
                        'user_id2'=> $jefe2,
                        'user_id3'=> $jefe3,
                        'user_id4'=> $jefe4,
                        'user_id5'=> $jefe5,
                        'user_id6'=> $jefe6,
                        'user_id7'=> $jefe7,
                        'area'=>$row['area'],
                        'state_e'=> '1',
                    ]);
            }else{
                return new Collaborator(
                    [
                        'name' => $row['nombre'],
                        'state'=>1, 
                        'document' => $row['documento'],
                        'cargo'=>$row['cargo'],
                        'centro_costo'=>$row['ceco'],
                        'user_id1'=> $row['jefe'],
                        'area'=>$row['area'],
                        'state_e'=> '1',
                    ]);
            }
        }else{
            return new Collaborator(
                [
                    'name' => $row['nombre'],
                    'state'=>1, 
                    'document' => $row['documento'],
                    'cargo'=>$row['cargo'],
                    'centro_costo'=>$row['ceco'],
                    'user_id1'=> $row['jefe'],
                    'area'=>$row['area'],
                    'state_e'=> '1',
                ]);
        }
        
        
    }
    public function rules(): array
    {
        return [
            // 'name' => ['required','string',],
            // 'email' => ['required','email'],
            // 'document' => ['required'],
            // 'position_id' => ['required'],
            // 'gerencia_id' => ['required'],
            // 'regional_id' => ['required'],
            // 'user_id' => ['required'],
        ];
    }
}
