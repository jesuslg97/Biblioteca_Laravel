<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Language extends Model
{
    protected $table = 'languages';
    use SoftDeletes;

    public function serieActor()
    {
        return $this->belongsTo(serieActor::class,'language_id');
    }
}
