<?php

namespace App\Imports;

use App\Models\Area_manager;
use Maatwebsite\Excel\Concerns\ToModel;

class AreaManagerImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Area_manager([
                'name'     => $row[0],
                'email'    => $row[1],
        ]);
    }
}
