<?php

namespace App\Imports;

use App\Models\Boss;
use App\Models\Collaborator;
use App\Models\Regional;
use App\Models\Retirement;
use App\Models\User;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Validators\Failure;
use PHPUnit\Framework\SkippedTest;
use Throwable;

class BossImport implements ToModel, WithHeadingRow, SkipsOnError, WithValidation, SkipsOnFailure

{
    use Importable, SkipsErrors; 

 

    public function model(array $row)
    {
        // $user2= User::where('name',$row['nombre'])->first();
        // $id_user = $user2->id;
        // $retirement_asoc = Retirement::where('user_id',$id_user)->first();
        // if($retirement_asoc){
        //     $retirement_asoc->user_id=$user2->name;
        // }
        $user = Boss::where('email',$row['email'])->first();
        
        if($user){
            $user->delete(); 
        }
        
        // $regional = Regional::where("description", "like", "%".$row['regional']."%")->first();
        return Boss::create(
            [
                'name' => $row['nombre'],
                'email'=>$row['email'], 
                'cargo' => $row['cargo'],
                'centro_costo' => $row['ceco'],
            ]);

    }
    public function rules(): array
    {
        return [
            // 'name' => ['required','string',],
            // 'email' => ['required','email'],
            // 'cargo' => ['required'],
            // 'regional_id' => ['required'],
        ];
    }
    public function onError(Throwable $e)
    {
    }
    public function onFailure(Failure ...$failures)
    {
       
    }
   
    
}
