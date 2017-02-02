<?php

namespace Scpm;

use Illuminate\Database\Eloquent\Model;
use DB;

class Location extends Model
{
    protected $table = 'locations';
    protected $fillable = ['idProvincia','idCanton','idParroquia'];
    protected $primaryKey = "idLocalizacion";

   	public static function cantons($id){
	return DB::table('locations')
	    ->join('cantons','cantons.idCanton','=','locations.idCanton')
        ->select('cantons.idCanton','cantons.nombreCanton')
        ->where('locations.idProvincia','=',$id)
        ->distinct()
        ->get();
	}

	public static function parishes($id){
	return DB::table('locations')
		->join('parishes','parishes.idParroquia','=','locations.idParroquia')
        ->select('parishes.idParroquia','parishes.nombreParroquia')
        ->where('locations.idCanton','=',$id)
        ->distinct()
        ->get();
	}

    /*Recibe como parametros los id de provincia, canton, parroquia 
    y me retorna el id de Localización*/
    public static function getLocation($id, $id2, $id3){
    return DB::table('locations')
        ->select('locations.idLocalizacion')
        ->where('locations.idProvincia','=',$id)
        ->where('locations.idCanton','=',$id2)
        ->where('locations.idParroquia','=',$id3)
        ->get();
    }
    


}
