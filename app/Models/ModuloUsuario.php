<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModuloUsuario extends Model
{
    protected $table = 'modulo_usuario';

    protected $fillable = [
        'user_id',
        'seminario_id',
        'modulo_id',
        'aciertos',
        'total_preguntas',
        'calificacion',
        'estatus',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function seminario()
    {
        return $this->belongsTo(Seminario::class, 'seminario_id');
    }

    public function modulo()
    {
        return $this->belongsTo(Modulos::class, 'modulo_id');
    }
}
