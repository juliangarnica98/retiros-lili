<?php

namespace App\Imports;

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
        // return new Collaborator([
        //     //
        // ]);
        
        $positions = Position::where("description", "like", "%".$row['Cargo']."%")->first();
        $regional = Regional::where("description", "like", "%".$row['REGIONAL']."%")->first();
        $gerencia = Gerencia::where("description", "like", "%".$row['GERENCIA']."%")->first();
    
        return new Collaborator(
            [
                'name' => $row['Nombre'],
                'state'=>1, 
                'document' => $row['Documento'],
                'position_id'=>$positions->id ,
                'gerencia_id'=>$gerencia->id ,
                'regional_id'=>$regional->id ,
                'user_id'=> $this->jefe
            ]);
    }
}
