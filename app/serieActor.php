<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class serieActor extends Model
{
    use SoftDeletes;
    public function serie()
    {
        return $this->belongsTo(Serie::class);
    }

    public function actor(){

        return $this->hasOne(Actor::class,'id','actor_id');
    }
}
