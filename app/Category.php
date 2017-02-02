<?php

namespace Scpm;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;


class Category extends Model
{
    use SoftDeletes;

    protected $table = "categories";
    protected $fillable = ['nombreCategoria'];
    protected $dates = ['deleted_at'];
    protected $primaryKey = "idCategoria";

    /*public static function getCategory($id){
        return DB::table('categories')
        ->where('categories.idGrupo','=',$id)
        ->lists('categories.nombreCategoria','categories.idCategoria');
    }*/
}
