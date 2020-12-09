<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reg_Identificador extends Model
{
    use HasFactory;

    protected $table = "reg_identificadores";

    protected $fillable = ['reg_ident_id', 'reg_fecha_ini','reg_fecha_fin'];
}
