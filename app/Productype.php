<?php

namespace Scpm;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use DB;

class Productype extends Model
{

    use SoftDeletes;
    protected $table = 'productypes';
    protected $fillable = ['idGrupo','nombreTipoProducto'];
    protected $dates = ['deleted_at'];
    protected $primaryKey = "idTipoProducto";

/*ESte metodo ecibe un Id de grupo y retorna todos los tipos correspondientes a ese grupo*/
    public static function getTipoProductos($id){
        return DB::table('productypes')
        ->where('productypes.idGrupo','=',$id)
        ->lists('productypes.nombreTipoProducto','productypes.idTipoProducto');
    }

 /*public static function getCompany($id){
        return DB::table('companies')
        ->join ('viewLocation','viewLocation.id','=','branches.idLocalizacion')
        ->select('branches.nombreSucursal','branches.ruc','branches.direccion','branches.telefono','branches.idSucursal as id','viewLocation.nombreProvincia','viewLocation.nombreCanton','viewLocation.nombreParroquia')
        ->where('branches.id','=',$id)
        ->get();
    }*/
}
