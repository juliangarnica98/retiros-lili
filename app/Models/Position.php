<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    use HasFactory;
    protected $fillable = [
        'description',
        'id_area',
        
    ];
    public function area()
    {
        return $this->belongsTo('App\Area');
    }

    public function collaborator()
    {
        return $this->belongsTo('App\Collaborator');
    }
}
