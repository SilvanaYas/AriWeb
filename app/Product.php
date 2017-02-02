<?php

namespace Scpm;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use DB;

class Product extends Model
{
		use SoftDeletes;

    protected $table = "products";
    protected $fillable = ['idTipoProducto','idEmpresa','nombreProducto','similarProducto'];
    protected $dates = ['deleted_at'];
    protected $primaryKey = "idProducto";



/*recibe el Id de la empresa principal y retorna todos los productos de farmacias*/
   public static function getProducts($id){
        return DB::table('products')
        ->join ('productypes','productypes.idTipoProducto','=','products.idTipoProducto')
        ->select('products.idProducto','products.nombreProducto','products.similarProducto','products.idTipoProducto','products.idEmpresa','productypes.nombreTipoProducto')
        ->where('products.idEmpresa','=',$id)
        ->get();
    }    

/*Recibe el id de la empresa principal y retorna todos los productos de gasolineras*/
     public static function getProductGaso($id){
        return DB::table('products')
        ->join ('productypes','productypes.idTipoProducto','=','products.idTipoProducto')
        ->join ('presentations','presentations.idProducto','=','products.idProducto')
        ->select('products.idProducto','products.nombreProducto','products.idTipoProducto','products.idEmpresa','productypes.nombreTipoProducto','presentations.idPresentacion','presentations.nombrePresentacion','presentations.fabricante','presentations.precioPresentacion')
        ->where('products.idEmpresa','=',$id)
        ->get();
    } 
        

   /* public static function yyyy2($id){  
    return  DB::select('select * FROM viewStock p  left join stock_products as productos on p.id_pro=productos.pro_id left join companies as sucursales on sucursales.id='.$id.'  WHERE   productos.pro_id NOT IN (SELECT  pro_id FROM stock_companies sc where sc.com_id='.$id.') and productos.cmp_id=sucursales.cmp_id');
    }*/

/*Recibe el id de la sucursal  y retorna todos los productos pertenecientes a la Empresa Principal*/

    public static function getProducts2($id){  
    return  DB::select('select p.idProducto, p.nombreProducto, p.similarProducto, pty.nombreTipoProducto 
                        FROM products p  
                        left join productypes as pty on pty.idTipoProducto = p.idTipoProducto 
                        left join branches as sucursales on sucursales.idSucursal ='.$id.'  
                        WHERE   p.idProducto NOT IN (SELECT  idProducto FROM stock_branches sc where sc.idSucursal='.$id.') and p.idEmpresa = sucursales.idEmpresa');
    }

    /*public static function XXX3($id){
    return  DB::select('select * FROM viewStock p  left join stock_products as productos on p.id_pro=productos.pro_id left join companies as sucursales on sucursales.id='.$id.'   WHERE   productos.pro_id IN (SELECT  pro_id FROM stock_companies sc where sc.com_id='.$id.') and productos.cmp_id=sucursales.cmp_id');
    }*/

/*Recibe el id de la sucursal  y retorna todos los productos pertenecientes a la sucursal*/

    public static function getProducts3($id){  
    return  DB::select('select p.idProducto, p.nombreProducto, p.similarProducto, pty.nombreTipoProducto 
                        FROM products p  
                        left join productypes as pty on pty.idTipoProducto = p.idTipoProducto 
                        left join branches as sucursales on sucursales.idSucursal ='.$id.'  
                        WHERE   p.idProducto IN (SELECT  idProducto FROM stock_branches sc where sc.idSucursal='.$id.') and p.idEmpresa = sucursales.idEmpresa');
    }

}
