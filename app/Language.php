<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    protected $table = 'languages';

    public function serieActor()
    {
        return $this->belongsTo(serieActor::class,'language_id');
    }
}
