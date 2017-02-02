<?php

namespace Scpm;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;
use DB;


class Company extends Model
{
    use SoftDeletes;

    protected $table = 'companies';
    protected $fillable = ['idGrupo','nombreEmpresa','logo','activo'];
    protected $dates = ['deleted_at'];
    protected $primaryKey = "idEmpresa";

    
    public function setLogoAttribute($logo){
        $this->attributes['logo'] = Carbon::now()->second.$logo->getClientOriginalName();
            $name = Carbon::now()->second.$logo->getClientOriginalName();
            \Storage::disk('local')->put($name, \File::get($logo));
    }


    /*ESte metodo recibe un ID del perfil de  empresa y retorna el perfil de la empresa,*/
      public static function getPerfil($id){
        return DB::table('companies')
        ->select('companies.nombreEmpresa','companies.logo','companies.idEmpresa as id')
        ->where('companies.idEmpresa','=',$id)
        ->get();
    }

    /*ESte metodo recibe un ID del perfil de  empresa y retorna todos los usuarios con sus respectivas empresas perteneciente a dicho perfil,*/
      public static function getSocios($id){
        return DB::table('users')
        ->select('users.nombreUsuario','users.apellidoUsuario','users.email','users.telefonoUsuario','activo','users.idUsuario')
        ->where('users.idEmpresa','=',$id)
        ->get();
    }

/*ESte metodo recibe el id del perfil y retorna el id de grupo al cual pertence el usuario*/
 public static function getIdGrupo($id){
        return DB::table('companies')
        ->select('companies.idGrupo')
        ->where('companies.idEmpresa','=',$id)
        ->get();
    }
    
    /*Este metodo recibe el id de la empresa principal y retorna todas las sucursales pertenecientes a esa empresa*/
    public static function getSucursales($id){
        return DB::table('branches')
        ->select('branches.idSucursal','branches.nombreSucursal','branches.direccion','branches.latitud','branches.longitud','branches.telefono','branches.propietario','branches.activo')
        ->where('branches.idEmpresa','=',$id)
        ->get();
    }

     public static function getGasolineras(){
        return DB::table('companies')
        ->join ('branches','branches.idEmpresa','=','companies.idEmpresa')
        ->select('branches.idSucursal','branches.nombreSucursal','branches.direccion','branches.latitud','branches.longitud','branches.telefono','branches.activo')
        ->where('companies.idGrupo','=',1)
        ->get();
    }
    public static function getFarmacias(){
        return DB::table('companies')
        ->join ('branches','branches.idEmpresa','=','companies.idEmpresa')
        ->select('branches.idSucursal','branches.nombreSucursal','branches.direccion','branches.latitud','branches.longitud','branches.telefono','branches.activo')
        ->where('companies.idGrupo','=',2)
        ->get();
    }

    public static function getBancos(){
        return DB::table('companies')
        ->join ('branches','branches.idEmpresa','=','companies.idEmpresa')
        ->select('branches.idSucursal','branches.nombreSucursal','branches.direccion','branches.latitud','branches.longitud','branches.telefono','branches.activo')
        ->where('companies.idGrupo','=',3)
        ->get();
    }
}

