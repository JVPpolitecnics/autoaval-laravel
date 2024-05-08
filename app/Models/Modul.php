<?php

namespace App\Models;

use App\Models\ResultatsAprenentatge;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
    public function resultat_aprenentatge(): HasMany
    {
        return $this->hasMany(ResultatsAprenentatge::class, 'moduls_id');
    }
}
