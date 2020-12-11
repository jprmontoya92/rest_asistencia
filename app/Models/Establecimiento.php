<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Establecimiento extends Model
{
    //Nombre de la tabla

    protected $table = 'establecimientos';

    //Eloquent asume que cada tabla tiene  una clave primaria con una columna llamada id
    //Si este no fuera el caso entonces hay que indicar cual es nuestra clave primaria en la tabla
    protected $primaryKey = 'esta_id';

    /*
    $guarded permite especificar qué campos no queremos que se asignen al modelo. Es decir, se asignan todos excepto los especificados en este array.

    Ejemplo:
    protected $guarded= ['is_admin'];

    Y $fillable te permite especificar qué campos sí quieres que se guarden en la base de datos. Es decir, se asignan únicamente los especificados en este array.

    Ejemplo:
    protected $fillable= ['modelo','longitud','capacidad','velocidad','alcance'];

    Ambas propiedades se usan en los 'asignamientos de datos en masa' en los modelos Eloquent y permiten protegerse en caso de que un usuario 'malicioso' haya modificado los campos del formulario para incluir campos que existen en la tabla pero que no queremos que se cubran automáticamente.

    Estas propiedades te permiten especificar qué datos se asignarán al modelo en los métodos en los que se usan 'asignamientos en masa'.
    Y, por tanto, qué datos se guardarán posteriormente en la base de datos.


    Ambos son excluyentes y, por tanto, deberías utilizar sólo uno de ellos. Si declaras ambos, sólo se tendrá en cuenta el contenido de $fillable.

    La diferencia fundamental entre usar uno u otro, está en cómo Laravel procesa ambas propiedades. Si usamos $fillable, cada vez que modifiquemos un formulario para añadir un nuevo campo, tendremos que añadirlo al array $fillable para que lo procese. Sin embargo, usando $guarded en un modelo, cada campo que añadimos a un formulario es procesado automáticamente e insertado en la Base de Datos. Esto aunque es muy cómodo, tiene varios inconvenientes:

    Si se nos olvida incluir un campo crítico que no debería ser modificado desde el formulario, un usuario malicioso podría aprovechar la vulnerabilidad.
    Si añadimos campos auxiliares del flujo del formulario que no existen en la base de datos, obtendremos un error de SQL porque Eloquent asumirá que existen e intentará asignarles el valor.
    Por tanto, es recomendable utilizar $fillable en lugar de $guarded.

 */

    protected $fillable = ['esta_id','esta_nombre','esta_direccion'];
      // Aquí ponemos los campos que no queremos que se devuelvan en las consultas.
    protected $hidden = ['created_at','updated_at'];

    public function ptoubicaciones(){

        //1 establecimiento puede tener muchas ubicaciones
        //$this hace referencia al ojeto que tengamos en ese momento de Establecimiento

        return $this->hasMany('App\Models\PtoUbicacion','pto_esta_id');
    }


}
