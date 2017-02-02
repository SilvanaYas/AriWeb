<?php

namespace Scpm;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;


class Shift extends Model
{
	use SoftDeletes;
    protected $table = 'shifts';
    protected $fillable = ['idSucursal','fechaInicio','fechaFin','horaInicio','horaFin','activo'];
    protected $dates = ['deleted_at'];
    protected $primaryKey = "idTurno";

    /*recibe un id de la sucursal y retorna todos los turnos de esa empresa*/
    public static function getTurnos($id){
        return DB::table('shifts')
        ->select('shifts.fechaInicio','shifts.fechaFin','shifts.horaInicio','shifts.horaFin','shifts.idTurno')
        ->where('shifts.idSucursal','=',$id)
        ->get();
    }

}
