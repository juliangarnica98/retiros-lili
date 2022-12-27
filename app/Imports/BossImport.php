<?php

namespace App\Imports;

use App\Models\Boss;
use App\Models\Regional;
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
// class BossImport implements ToModel, WithHeadingRow, SkipsOnError, WithValidation
{
    use Importable, SkipsErrors; 

    public function rules(): array
    {
        return [
            // 'email' => ['required'],
            // '*.name'=> ['required'],
            // '*.cargo' => ['required'],
            // '*.regional_id' => ['required']
        ];
    }

    public function model(array $row)
    {
        // dd($row);
        $user = Boss::where('email',$row['correo'])->first();
        if($user){
            $user->delete(); 
        }
        $regional = Regional::where("description", "like", "%".$row['regional']."%")->first();
        return Boss::create(
            [
                'name' => $row['nombre'],
                'email'=>$row['correo'], 
                'cargo' => $row['cargo'],
                'regional_id' => $regional->id,
            ]);
    }

    public function onError(Throwable $e)
    {
    }
    public function onFailure(Failure ...$failures)
    {
       
    }
   
    
}
