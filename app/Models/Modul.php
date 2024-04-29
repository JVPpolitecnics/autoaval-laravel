<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modul extends Model
{
    use HasFactory;
    protected $table = 'moduls';
    public $timestamps = false;
    protected $primaryKey = 'id';
    function areCoursedBy(){
        return $this->belongsToMany(Usuari::class, 'usuaris_has_moduls', 'usuaris_id', 'moduls_id');
    }
    function cicle(){
        return $this->belongsTo(Cicle::class, 'cicles_id');
    }
}
