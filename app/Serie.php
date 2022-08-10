<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Serie extends Model
{
    protected $table = 'series';

    public function serieActors()
    {
        return $this->hasMany(serieActor::class);
    }

    public function serieLanguages()
    {
        return $this->hasMany(serieLanguage::class);
    }
}
