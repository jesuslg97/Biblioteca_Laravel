<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Serie extends Model
{
    protected $table = 'series';
    use SoftDeletes;

    public function serieActors()
    {
        return $this->hasMany(serieActor::class);
    }

    public function serieLanguages()
    {
        return $this->hasMany(serieLanguage::class);
    }
}
