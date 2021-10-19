<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Servicio;

class Funcionario extends Model
{
    //
    protected  $primaryKey = 'id_funcionario';
    protected $fillable = ['id_funcionario','codigo_plaza', 'id_area', 'id_cargo' ,'nombre', 'apellido_paterno', 'apellido_materno', 'observacion'];
    public $timestamps = false;
    public function setUpdatedAt($value)
      {
        return NULL;
      }
      public function setCreatedAt($value)
      {
        return NULL;
      }
      public function area(){
        return $this->belongsTo('App\Area','id_area', 'id_area');
      }
      public function cargo(){
        return $this->belongsTo('App\Cargo','id_cargo', 'id_cargo');
      }
      public function servicio(){
        return $this->belongsToMany('App\Servicio', 'funcionario_servicio', 'id_funcionario', 'id_servicio');
      }
      public function equipo_computo(){
        return $this->hasMany('App\Equipo_computo','id', 'id_funcionario');
      }
      public function scopeNombre($query, $nombre){
        if($nombre)
        return $query->where('nombre', 'LIKE', "%$nombre%");
      }
}
