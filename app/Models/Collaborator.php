<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Collaborator extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_user',
        'name',
        'document',
        'state',
        'id_position',
    ];
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function position() 
    {
        return $this->hasOne('App\Position');
    }
    public function retirement()
    {
        return $this->belongsTo('App\Retirement');
    }
}
