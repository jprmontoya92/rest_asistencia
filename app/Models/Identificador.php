<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Identificador extends Model
{
    protected  $table = 'identificadores';

    protected $primary_key = 'ident_id';

    protected $fillable = ['ident_activo','ident_pto_id'];
    
    
    public function ptoubicaciones(){

        //1 identificador pertence a una unica
        return $this->belongsTo('App\Models\PtoUbicacion');
    }

    public function eventos(){

        //1 identificador puede tener varios eventos
        return $this->belongsTo('App\Models\Evento');
    }
}
