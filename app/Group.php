<?php

namespace Scpm;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Group extends Model
{
	use SoftDeletes;

    protected $table = 'groups';
    protected $fillable = ['nombreGrupo'];
    protected $dates = ['deleted_at'];
    protected $primaryKey = "idGrupo";

}
