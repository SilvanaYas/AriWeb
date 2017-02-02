<?php

namespace Scpm;

use Illuminate\Database\Eloquent\Model;
use DB;

class Province extends Model
{
    protected $table = 'provinces';
    protected $fillable = ['nombreProvincia','activo'];
    protected $primaryKey = "idProvincia";
}