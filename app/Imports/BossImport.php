<?php

namespace App\Imports;

use App\Models\Boss;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class BossImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    
    public function model(array $row)
    {
        // dd($row);
        return Boss::create(
            [
                'name' => $row['nombre'],
                'email'=>$row['correo'], 
                'cargo' => $row['cargo'],
                'regional_id' => $row['regional_id'] 
            ]);
    }
}
