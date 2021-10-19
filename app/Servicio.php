<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use App\Funcionario;

class Servicio extends Model
{
    protected  $primaryKey = 'id_servicio';
    protected $fillable = ['nombre_servicio', 'id_servicio'];
    public $timestamps = false;
    public function setUpdatedAt($value)
      {
        return NULL;
      }
      public function setCreatedAt($value)
      {
        return NULL;
      }
      public function funcionario(){
        return $this->belongsToMany('App\Funcionario', 'funcionario_servicio', 'id_servicio' , 'id_funcionario');
      }
      public function scopeNombre_Servicio($query, $nombre_servicio){
        if($nombre_servicio)
        return $query->where('nombre_servicio', 'LIKE', "%$nombre_servicio%");
      }
}
