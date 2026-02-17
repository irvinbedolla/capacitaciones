<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fotografia extends Model{
    //use HasFactory;
    protected $table = 'fotografias';
    protected $primaryKey = 'id';
    protected $fillable = ['id_ponente','nombre_foto', 'fotografia'];

}
?>
