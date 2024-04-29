<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuari extends Model
{
    use HasFactory;
    protected $table = 'usuaris';
    public $timestamps = false;
    protected $primaryKey = 'id';
    public function tipus()
    {
        return $this->belongsTo(TipusUsuari::class, 'tipus_usuaris_id');
    }
    function has_modules(){
        return $this->belongsToMany(Modul::class, 'usuaris_has_moduls', 'usuaris_id', 'moduls_id');
    }
    function has_criteris(){
        return $this->belongsToMany(CriterisAvaluacio::class, 'alumnes_has_criteris_avaluacio', 'usuaris_id', 'criteris_avaluacio_id');
    }
}
