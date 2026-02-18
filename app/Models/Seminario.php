<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seminario extends Model
{
    //use HasFactory;
    protected $table = 'seminarios';
    protected $primaryKey = 'id';
    protected $fillable = ['nombre','fecha_inicial','fecha_final', 'id_ponente'];

    public function respuestas()
    {
        return $this->hasMany(Respuesta::class, 'seminario_id');
    }
    
}
