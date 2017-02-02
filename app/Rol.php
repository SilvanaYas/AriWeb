<?php

namespace Scpm;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Rol extends Model
{
	
	use SoftDeletes;

    protected $table = "rols";
    protected $fillable = ['nombreRol'];
    protected $dates = ['deleted_at'];
    protected $primaryKey = "idRol";
}
