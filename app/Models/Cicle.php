<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Modul;

class Cicle extends Model
{
    use HasFactory;
    protected $table = 'cicles';
    public $timestamps = false;
    protected $primaryKey = 'id';

function has_many_moduls(){
    return $this->hasMany(Modul::class, 'cicles_id');
}
}