<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    use HasFactory;
    
    protected $table = 'eventos';
    protected $fillable = ['even_tipo','even_fecha','even_usu_rut','even_lat','even_lng','even_ident_id'];
    protected $primaryKey = 'even_id';

    public function usuarios(){
        //1 evento pertenece a un usuario 

        return $this->belongsTo('App\Models\User');

    }

    public function identificadores(){
        //1 evento pertence a un identificador

        return $this->belongsTo('App\Models\Identificador');
    }

}
