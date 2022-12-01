<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area_manager extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'number_id',
        'email'
    ];
}
