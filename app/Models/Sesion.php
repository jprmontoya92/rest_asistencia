<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sesion extends Model
{
    protected $table = 'sesiones';  
    protected $primary_key = 'ses_id';

    protected $fillable = ['ses_usu_rut,ses_fec','updated_at','created_at'];

    //protected $hidden = ['updated_at','created_at',
    //];

    public function usuarios(){

        //una sesion pertenece a un usuario

         return $this->belongsTo('App\Models\User');
    }
}
