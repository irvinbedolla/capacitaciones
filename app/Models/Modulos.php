<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modulos extends Model
{
    //use HasFactory;

    protected $table = 'modulos';

    protected $fillable = [
        'id_seminario',
        'numero_modulo',
        'nombre',
        'contenido',
        'id_ponente',
        'status'
    ];

    public function documentos()
    {
        return $this->hasMany(ModuloDocumento::class, 'id_modulo');
    }

    public function seminario()
    {
        return $this->belongsTo(Seminario::class, 'id_seminario');
    }
}