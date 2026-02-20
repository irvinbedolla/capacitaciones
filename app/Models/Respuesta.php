<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Respuesta extends Model
{
    protected $table = 'respuestas';
    protected $primaryKey = 'id';

    protected $fillable = [
        'seminario_id',
        'modulo_id',
        'pregunta',
        'respuestas',
        'respuesta_correcta'
    ];

    protected $casts = [
        'respuestas' => 'array'
    ];

    public function seminario()
    {
        return $this->belongsTo(Seminario::class, 'seminario_id');
    }
}
