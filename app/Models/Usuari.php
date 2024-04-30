<?php

namespace App\Models;


use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Usuari extends Authenticable
{
    use HasFactory,  HasApiTokens, Notifiable;
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
    public function getAuthIdentifierName()
    {
        return 'id'; // Assuming 'id' is the name of your primary key column
    }
}
