<?php

namespace Scpm;

use Illuminate\Database\Eloquent\Model;

class Parish extends Model
{
    protected $table = 'parishes';
    protected $fillable = ['nombreParroquia','activo'];
    protected $primaryKey = "idParroquia";
}
