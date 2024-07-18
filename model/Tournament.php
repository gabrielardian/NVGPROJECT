<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tournament extends Model
{
    protected $fillable = [
        'id_categories','name','tanggal','logo'
    ];

    protected $hidden = [

    ];

}
