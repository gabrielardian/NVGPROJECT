<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tanding extends Model
{
    protected $fillable = [
        'id_team','id_tournament'
    ];

    protected $hidden = [

    ];

    public function get_team(){
        return $this->belongsTo( Team::class, 'id_team', 'id' );
    }

    public function get_tournament(){
        return $this->belongsTo( Tournament::class, 'id_tournament', 'id' );
    }
    
}
