<?php

namespace Scpm;

use Illuminate\Database\Eloquent\Model;
use DB;

class Canton extends Model
{
     protected $table = 'cantons';
    protected $fillable = ['nombreCanton','activo'];
    protected $primaryKey = "idCanton";

}
