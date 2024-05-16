<?php

namespace App\Models;

use App\Models\CriterisAvaluacio;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ResultatsAprenentatge extends Model
{
    use HasFactory;
    protected $table = 'resultats_aprenentatge';
    public $timestamps = false;

    public function criteris_avaluacio(): HasMany
    {
        return $this->hasMany(CriterisAvaluacio::class);
    }
}
