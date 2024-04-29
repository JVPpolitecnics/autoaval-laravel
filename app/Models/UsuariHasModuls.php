<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsuariHasModuls extends Model
{
    use HasFactory;
    protected $table = 'usuaris_has_moduls';
    public $timestamps = false;
    protected $primaryKey = ['usuaris_id', 'moduls_id'];
}
