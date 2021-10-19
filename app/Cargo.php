<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{
    //
    protected  $primaryKey = 'id_cargo';
    protected $fillable = ['id_cargo','nombre_cargo'];
    public $timestamps = false;

    public function setUpdatedAt($value)
      {
        return NULL;
      }
      public function setCreatedAt($value)
      {
        return NULL;
      }
      public function Funcionario(){
        return $this->hasOne('App\Funcionario','id_funcionario', 'id_cargo');
      }
      public function scopeNombre_cargo($query, $nombre_cargo){
        if($nombre_cargo)
        return $query->where('nombre_cargo', 'LIKE', "%$nombre_cargo%");
      }
}
