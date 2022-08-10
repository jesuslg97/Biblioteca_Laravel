<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class serieActor extends Model
{
    public function serie()
    {
        return $this->belongsTo(Serie::class);
    }

    public function actor(){

        return $this->hasOne(Actor::class,'id','actor_id');
    }
}
