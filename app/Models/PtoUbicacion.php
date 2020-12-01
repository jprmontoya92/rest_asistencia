<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PtoUbicacion extends Model
{
    protected $table = 'pto_ubicaciones';

    protected $primaryKey = 'pto_id';

    protected $fillable = ['pto_nombre','pto_descripcion','pto_lat','pto_lng','pto_esta_id'];
    
    // Definimos a continuación la relación de esta tabla con otras.
	// Ejemplos de relaciones:
	// 1 usuario tiene 1 teléfono   ->hasOne() Relación 1:1
	// 1 teléfono pertenece a 1 usuario   ->belongsTo() Relación 1:1 inversa a hasOne()
	// 1 post tiene muchos comentarios  -> hasMany() Relación 1:N 
	// 1 comentario pertenece a 1 post ->belongsTo() Relación 1:N inversa a hasMany()
	// 1 usuario puede tener muchos roles  ->belongsToMany()
    //  etc..
    
    public function establecimiento(){

        //1 avion pertenece a un fabricante
        // $this hace referencia al objeto que tengamos en ese momento de ptoubicacion
        return $this->belongsTo('App\Models\Establecimiento');
    }

    public function identificadores(){
        
        // 1 ptoubicacion tiene muchos identificadores
        return $this->hasMany('App\Models\Identificador');
    }
}
