<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne; 
class Rubriques extends Model
{
    use HasFactory;
    protected $table = 'rubriques';
    public $timestamps = false;

    public function has_one_criter(): HasOne
    {
        return $this->hasOne(CriterisAvaluacio::class, "criteris_avaluacio_id");
    }
}
