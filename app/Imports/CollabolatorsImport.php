<?php

namespace App\Imports;

use App\Models\Collaborator;
use App\Models\Position;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Auth;

class CollabolatorsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // return new Collaborator([
        //     //
        // ]);
        
        $positions = Position::where("description", "like", "%".$row[3]."%")->first();
    
        return new Collaborator(
            [
                'name' => $row[2],
                'state'=>1, 
                'document' => $row[1],
                'position_id'=>$positions->id ,
                'user_id'=> Auth::user()->id
            ]);
    }
}
