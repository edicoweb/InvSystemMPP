<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class Tipo_equipo extends Model
{
    protected  $primaryKey = 'id_tipo_equipo';
    protected $fillable = ['id_tipo_equipo', 'nombre_tipo_equipo'];
    public $timestamps = false;
    public function setUpdatedAt($value)
      {
        return NULL;
      }
      public function setCreatedAt($value)
      {
        return NULL;
      }
      public function equipo_computo(){
         return $this->hasMany('App\Equipo_computo','id', 'id_tipo_equipo');
      }
    public function scopeNombre_tipo_equipo($query, $nombre_tipo_equipo){
      if($nombre_tipo_equipo)
      return $query->where('nombre_tipo_equipo', 'LIKE', "%$nombre_tipo_equipo%");
    }
}
