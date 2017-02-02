<?php

namespace Scpm;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use DB;

class Schedule extends Model
{
	use SoftDeletes;

    protected $table = "schedules";
    protected $fillable = ['idSucursal','descripcion','horaInicioHorario','horaFinHorario'];
    protected $dates = ['deleted_at'];
    protected $primaryKey = "idHorario";

      public static function getHorariosCompany($id){
        return DB::table('schedules')
        ->select('schedules.horaInicioHorario','schedules.horaFinHorario','schedules.idHorario')
        ->where('schedules.idSucursal','=',$id)
        ->get();
    }
}
