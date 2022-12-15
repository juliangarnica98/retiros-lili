<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;


class UsersImport implements ToModel
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
        return User::create(
            [
                'name' => $row[1],
                'email'=>$row[3], 
                'password' => Hash::make($row[0])
            ])->assignRole('Jefe');
    }
}
