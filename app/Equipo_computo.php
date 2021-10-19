<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class Equipo_computo extends Model
{
    protected  $primaryKey = 'id';
    protected $fillable = ['id','direccion_mac', 'marca', 'modelo', 'nombre_equipo', 'nombre_usuario_equipo', 'observacion', 'id_ip', 'id_funcionario', 'id_tipo_equipo'];
    public $timestamps = false;
    public function setUpdatedAt($value)
      {
        return NULL;
      }
      public function setCreatedAt($value)
      {
        return NULL;
      }
      public function protocolo_internet(){
        return $this->belongsTo('App\Protocolo_internet','id_ip', 'id_ip');
      }
      public function funcionario(){
        return $this->belongsTo('App\Funcionario','id_funcionario', 'id_funcionario');
      }
      public function tipo_equipo(){
        return $this->belongsTo('App\Tipo_equipo','id_tipo_equipo', 'id_tipo_equipo');
      }
      //Scope
      public function scopeId($query, $id){
        if($id)
          return $query->where('id', 'LIKE', "%$id%");
      }
      public function scopeMarca($query, $marca){
        if($marca)
        return $query->where('marca', 'LIKE', "%$marca%");
      }


}
