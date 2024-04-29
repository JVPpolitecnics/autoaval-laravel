<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CriterisAvaluacio extends Model
{
    use HasFactory;
    protected $table = 'criteris_avaluacio';
    public $timestamps = false;

    function has_usuari(){
        return $this->belongsToMany(Usuari::class, 'alumnes_has_criteris_avaluacio', 'criteris_avaluacio_id', 'usuaris_id');
    }
}
