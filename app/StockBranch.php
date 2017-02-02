<?php

namespace Scpm;

use Illuminate\Database\Eloquent\Model;

class StockBranch extends Model
{
    protected $table = 'stock_branches';
    protected $fillable = ['idProducto','idSucursal'];
    protected $primaryKey = "idStockSucursal";
}
