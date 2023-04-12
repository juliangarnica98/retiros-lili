<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Collaborator extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id1',
        'user_id2',
        'user_id3',
        'user_id4',
        'user_id5',
        'user_id6',
        'user_id7',
        'name',
        'document',
        'state',
        'cargo',
        'centro_costo',
        'area',
        'state_e',
        
    ];
    // public function user()
    // {
    //     return $this->belongsTo('App\User');
    // }

    public function position() 
    {
        return $this->hasOne('App\Position');
    }
    public function retirement()
    {
        return $this->belongsTo('App\Retirement');
    }
    public function gerencia() 
    {
        return $this->hasOne('App\Gerencia');
    }
    public function regional() 
    {
        return $this->hasOne('App\Regional');
    }
}
