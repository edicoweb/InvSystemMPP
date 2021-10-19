<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
class Protocolo_internet extends Model
{
    protected  $primaryKey = 'id_ip';
    protected $fillable = ['id_iṕ', 'ip', 'observacion', 'puerta_enlace'];
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
         return $this->hasMany('App\Equipo_computo','id', 'id_ip');
      }
      public function scopeIp($query, $ip){
        if($ip)
        return $query->where('ip', 'LIKE', "%$ip%");
      } 
}
