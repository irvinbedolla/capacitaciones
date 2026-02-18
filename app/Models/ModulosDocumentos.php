<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModulosDocumentos extends Model
{
   //use HasFactory;

    protected $table = 'modulos_documentos';

    protected $fillable = [
        'id_modulo',
        'id_seminario',
        'nombre',
        'tipo',
    ];

    public function modulo()
    {
        return $this->belongsTo(Modulos::class, 'id_modulo');
    }
}