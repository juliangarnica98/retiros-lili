<?php

namespace App\Imports;

use App\Models\User;
use App\Models\Boss;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UsersImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // return new User([
        //     'name'     => $row[0],
        //     'email'    => $row[1], 
        //     'password' => Hash::make($row[2]),
        //  ]);
        User::create(
            [
                'name' => $row['nombre'],
                'email'=>$row['correo'], 
                'password' => Hash::make($row['documento'])
            ])->assignRole('Jefe');

       
    }
}
