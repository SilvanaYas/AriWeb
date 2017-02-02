<?php

namespace Scpm;

use Illuminate\Database\Eloquent\Model;
use DB;

class Promotion extends Model
{

    protected $table = "promotions";
    protected $fillable = ['idPresentacion','nombrePromocion','descripcion','fechaInicioPromo','fechaFinPromo','activo'];
    protected $primaryKey = "idPromocion";

    /*recibe el Id de la empresa principal y retorna todos los productos de farmacias*/
   public static function getPromotions($id){
        return DB::table('promotions')
        ->select('promotions.idPromocion','promotions.nombrePromocion','promotions.descripcion','promotions.fechaInicioPromo','promotions.fechaFinPromo','promotions.activo')
        ->where('promotions.idPresentacion','=',$id)
        ->get();
    }

       /*Recibe el id de la empresa y retorna todos los productos en promocion*/

    public static function getPromociones($id){
     return DB::table('products')
        ->join ('presentations','presentations.idProducto','=','products.idProducto')
        ->join ('promotions','promotions.idPresentacion','=','presentations.idPresentacion')
        ->select('products.nombreProducto','presentations.nombrePresentacion','promotions.nombrePromocion','promotions.descripcion','promotions.fechaInicioPromo','promotions.fechaFinPromo','promotions.idPromocion','promotions.activo')
        ->where('products.idEmpresa','=',$id)
        ->get();
    }

}


