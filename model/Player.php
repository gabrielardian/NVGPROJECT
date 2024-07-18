<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{

    protected $fillable = [
        'id_team','player1','level1','player2','level2','player3','level3','player4','level4',
        'player5','level5'
    ];

    protected $hidden = [

    ];

    public function teams(){
        return $this->belongsTo( Team::class, 'id_team', 'id' );
    }

    
}
