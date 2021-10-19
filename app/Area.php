<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected  $primaryKey = 'id_area';
    protected $fillable = ['id_sede','nombre_area', 'sigla_area'];
    public $timestamps = false;
    public function setUpdatedAt($value)
      {
        return NULL;
      }
    public function setCreatedAt($value)
      {
        return NULL;
      }
    public function sede(){
      return $this->belongsTo('App\Sede','id_sede');
    }
    public function areapadre(){
      return $this->belongsTo('App\Area','id_subarea','id_area');
    }
    public function subareas(){
      return $this->hasMany('App\Area','id_area', 'id_subarea');
    }
    public function Funcionario(){
       return $this->hasMany('App\Funcionario','id_funcionario', 'id_area');
    }
    public function scopeNombre_area($query, $nombre_area){
      if($nombre_area)
      return $query->where('nombre_area', 'LIKE', "%$nombre_area%");
    }
}
