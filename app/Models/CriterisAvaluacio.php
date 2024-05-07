<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany; 

class CriterisAvaluacio extends Model
{
    use HasFactory;
    protected $table = 'criteris_avaluacio';
    public $timestamps = false;

    function has_usuari(){
        return $this->belongsToMany(Usuari::class, 'alumnes_has_criteris_avaluacio', 'criteris_avaluacio_id', 'usuaris_id');
    }
    public function has_many_rubrica(): HasMany
    {
        return $this->hasMany(Rubriques::class);
    }
}
