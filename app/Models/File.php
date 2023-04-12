<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;
    use HasFactory;
    protected $fillable = [
        'date_jefes',
        'date_colaboradores',
        'file_jefe',
        'file_colaboradores',
        
    ];
}
