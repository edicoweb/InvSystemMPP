<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sede extends Model
{
  protected  $primaryKey = 'id_sede';
  protected $fillable = ['nombre_sede', 'id_sede'];
  public $timestamps = false;

  public function setUpdatedAt($value)
    {
      return NULL;
    }
  public function setCreatedAt($value)
    {
      return NULL;
    }
  public function Area(){
    return $this->hasMany('App\Area');
  }
//Scope
  public function scopeNombre_sede($query, $nombre_sede){
    if($nombre_sede)
    return $query->where('nombre_sede', 'LIKE', "%$nombre_sede%");
  }
}