<?php

namespace Scpm;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;

class Branch extends Model
{
    use SoftDeletes;

    protected $table = 'branches';
    protected $fillable = ['idEmpresa','idLocalizacion','nombreSucursal','direccion','latitud','longitud','telefono','activo','propietario','email'];   
    protected $dates = ['deleted_at'];
    protected $primaryKey = "idSucursal";


    /*ESte metodo recibe un ID de sucursal y retorna todos sus datos*/
     public static function getDatosSucursal($id){
        return DB::table('branches')
        ->join ('viewLocation','viewLocation.idLocalizacion','=','branches.idLocalizacion')
        ->select('branches.nombreSucursal','branches.latitud','branches.longitud','branches.direccion','branches.telefono','branches.idSucursal','viewLocation.nombreProvincia','viewLocation.nombreCanton','viewLocation.nombreParroquia')
        ->where('branches.idSucursal','=',$id)
        ->get();
    }

    /*ESte metodo recibe un id de Localizacion y retorna todas las gasolineras de esa Localizacion*/
    public static function getLocGasolineras($id){
        return DB::table('companies')
        ->join ('branches','branches.idEmpresa','=','companies.idEmpresa')
        ->select('branches.nombreSucursal','branches.direccion','branches.latitud','branches.longitud','branches.telefono')
        ->where('companies.idGrupo','=',1)
        ->where('branches.idLocalizacion','=',$id)
        ->get();
    }
    
    /*ESte metodo recibe un id de Localizacion y retorna todas las farmacias de esa Localizacion*/
    public static function getLocFarmacias($id){
        return DB::table('companies')
        ->join ('branches','branches.idEmpresa','=','companies.idEmpresa')
        ->select('branches.nombreSucursal','branches.direccion','branches.latitud','branches.longitud','branches.telefono')
        ->where('companies.idGrupo','=',2)
        ->where('branches.idLocalizacion','=',$id)
        ->get();
    }

    /*ESte metodo recibe un id de Localizacion y retorna todas las gasolineras de esa Localizacion*/
    public static function getLocBancos($id){
        return DB::table('companies')
        ->join ('branches','branches.idEmpresa','=','companies.idEmpresa')
        ->select('branches.nombreSucursal','branches.direccion','branches.latitud','branches.longitud','branches.telefono')
        ->where('companies.idGrupo','=',3)
        ->where('branches.idLocalizacion','=',$id)
        ->get();
    }

    /*Recibe un id de la empresa y devuelve el logo de la Empresa a la que pertenece*/
    public static function getLogo($id){
        return DB::table('companies')
        ->select('companies.logo')
        ->where('companies.idEmpresa','=',$id)
        ->get();
    }

    //Este método recibe la lon y la lat del Usuario y retorna todas las gasolineras cercanas a la posición del usuario.
    public static function getGasoCercanas($lat, $lon){
        return DB::select(' SELECT nombreSucursal, latitud, direccion, telefono, longitud, (6371 * ACOS( 
                                SIN(RADIANS(latitud)) * SIN(RADIANS(-3.99650134)) 
                                + COS(RADIANS(longitud - -79.20624985)) * COS(RADIANS(latitud)) 
                                * COS(RADIANS(-3.99650134))
                                )
                   ) AS distance
                        FROM branches
                        HAVING distance < 4
                        ORDER BY distance ASC');
    }
}
