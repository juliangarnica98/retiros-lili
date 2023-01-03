<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\Importable;
use App\Models\User;
use App\Models\Boss;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Validators\Failure;
use Throwable;

class UsersImport implements ToModel, WithHeadingRow, SkipsOnError, WithValidation, SkipsOnFailure
// class UsersImport implements ToModel, WithHeadingRow, SkipsOnError, WithValidation
{
    use Importable, SkipsErrors; 

    public function rules(): array
    {
        return [
            //  'email' => ['required'],
            // 'email' => [
            //     'required',
            //     'string',
            // ],
            
        ];
    }
    public function model(array $row)

    {
        dd($row);
        $user = User::where('email',$row['correo'])->first();
        if($user){
            $user->delete(); 
        }
        // return new User([
        //     'name'     => $row[0],
        //     'email'    => $row[1], 
        //     'password' => Hash::make($row[2]),
        //  ]);
        User::create(
            [
                'name' =>$row['nombre'],
                'email'=>$row['correo'], 
                'password' => Hash::make($row['documento'])
            ])->assignRole('Jefe');

       
    }
    public function onError(Throwable $e)
    {
    }
    public function onFailure(Failure ...$failures)
    {
        // Handle the failures how you'd like.
    }
    // }
    
}
