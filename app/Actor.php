<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Actor extends Model
{
    protected $table = 'actors';
    use SoftDeletes;

    public function serieActor()
    {
        return $this->belongsTo(serieActor::class,'actor_id');
    }
}
