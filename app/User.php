<?php

namespace Scpm;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Carbon\Carbon;
use DB;

class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword, SoftDeletes;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['idEmpresa','idSucursal','idRol','nombreUsuario','apellidoUsuario','telefonoUsuario','activo','email','password','confirm_token'];
    protected $dates = ['deleted_at'];
    protected $primaryKey = "idUsuario";



    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

     public function setPasswordAttribute($valor){
        if(!empty($valor)){
            $this->attributes['password'] = \Hash::make($valor);
        }
    }


    /*Este metodo que recibe de parámetro el id del usuario y me retorna el id de la Empresa q pertenece*/
    public static function getIdPerfil($id){
        return DB::table('users')
        ->select('users.idEmpresa')
        ->where('users.idUsuario','=',$id)
        ->get();
    }

//EL metodo retorna todos los usuarios con perfil administrador
    public static function getAdmin(){
        return DB::table('users')
        ->select('users.idUsuario','users.nombreUsuario','users.apellidoUsuario','users.telefonoUsuario','users.email','users.activo','users.idRol')
        ->where('users.idRol','=', 1)
        ->get();
    }

    /*Método que retorna todos los Operadores Económicos*/
     public static function getUsuarios(){
        return DB::table('users')
        ->select('users.nombreUsuario','users.apellidoUsuario','users.email','users.telefonoUsuario','users.activo')
        ->where('users.idRol','<>', 1)
        ->get();
    }
    /*Método que ecibe un id del Usuario y retorna sus datos*/
    public static function getUserData($id){
        return DB::table('users')
        ->select('users.idUsuario','users.nombreUsuario','users.apellidoUsuario','users.telefonoUsuario','users.email')
        ->where('users.idUsuario','=',$id)
        ->get();
    }
    
  }
