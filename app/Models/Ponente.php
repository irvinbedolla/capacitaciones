<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ponente extends Model{
    //use HasFactory;
    protected $table = 'ponente';
    protected $primaryKey = 'id';
    protected $fillable = ['id_usuario','nombre','semblanza'];

    public function fotografia()
    {
        return $this->hasOne(Fotografia::class, 'id_ponente');
    }

    public function seminarios()
    {
        return $this->hasMany(Seminario::class, 'id_ponente');
    }
}

?>
