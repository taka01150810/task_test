<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    //複数の中から1つを選べる(お店と路線)
    public function shops(){
        return $this->hasMany('App\Models\Shop');
    }
}
