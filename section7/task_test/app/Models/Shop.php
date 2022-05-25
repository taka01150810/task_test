<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    //複数の中から1つを選べる(お店と路線)
    public function area(){
        return $this->belongsTo('App\Models\Area');
    }
}
