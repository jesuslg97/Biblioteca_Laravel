<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class serieLanguage extends Model
{
    use SoftDeletes;
    public function serie()
    {
        return $this->belongsTo(Serie::class);
    }

    public function language(){

        return $this->hasOne(Language::class,'id','language_id');
    }
}
