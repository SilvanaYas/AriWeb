<?php

namespace Scpm;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;

class Presentation extends Model
{
    use SoftDeletes;

    protected $table = "presentations";
    protected $fillable = ['idProducto','nombrePresentacion','fabricante','unidadesPresentacion','precioPresentacion','precioUnidad','precioTope','observacion'];
    protected $dates = ['deleted_at'];
    protected $primaryKey = "idPresentacion";

/*REVISAR SI AUN SIRVE*/
    public static function getPresentations($id){
        return DB::table('presentations')
        ->select('presentations.idPresentacion','presentations.nombrePresentacion','presentations.fabricante','presentations.unidadesPresentacion','presentations.precioPresentacion','presentations.precioUnidad','presentations.observacion')
        ->where('presentations.idProducto','=',$id)
        ->get();
    }
}
