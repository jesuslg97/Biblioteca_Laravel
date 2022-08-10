<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class serieLanguage extends Model
{
    public function serie()
    {
        return $this->belongsTo(Serie::class);
    }

    public function language(){

        return $this->hasOne(Language::class,'id','language_id');
    }
}
