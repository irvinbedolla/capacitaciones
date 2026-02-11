<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ponente extends Model{
    //use HasFactory;
    protected $table = 'ponente';
    protected $primaryKey = 'id';
    protected $fillable = ['id_usuario','nombre','semblanza'];   
}

?>
