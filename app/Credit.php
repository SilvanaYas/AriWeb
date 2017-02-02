<?php

namespace Scpm;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;

class Credit extends Model
{
    use SoftDeletes;

    protected $table = "credits";
    protected $fillable = ['idEmpresa','montoMinimo','montoMaximo','plazoMinimo','plazoMaximo','tasaInteres','idCategoria'];
    protected $dates = ['deleted_at'];
    protected $primaryKey = "idCredito";

    public static function getCredits($id){
        return DB::table('credits')
        ->join('categories','categories.idCategoria','=','credits.idCategoria')
        ->select('credits.montoMinimo','credits.montoMaximo','credits.plazoMinimo','credits.plazoMaximo','credits.idCredito','credits.tasaInteres','categories.nombreCategoria','categories.idCategoria')
        ->where('credits.idEmpresa','=',$id)
        ->get();
    }

}
