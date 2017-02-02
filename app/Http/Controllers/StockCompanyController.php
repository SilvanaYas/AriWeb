<?php

namespace Scpm\Http\Controllers;

use Illuminate\Http\Request;

use Scpm\Http\Requests;
use Scpm\Http\Controllers\Controller;
use Illuminate\Routing\Route;
use Scpm\Product;
use Scpm\StockBranch;
use Session;
use Redirect;
use Auth;
use DB;
use Datatables;

class StockCompanyController extends Controller
{

    public function __construct(){
         $this->beforeFilter('@find',['only' => ['edit','update','destroy']]);
    }

    public function find(Route $route){
        $this->stock = StockBranch::find($route->getParameter('products'));
        $this->notFound($this->stock);
    }

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$com_id = Session::get('com_id');
        //$products = Product::getProducts3($com_id);
       //return view('stock.index1',compact('products'));  
    return view('stock.index1');    
  
   }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

     public function toCollection($jsonArray){
$collection = collect([]);
        for ($i=0; $i < count($jsonArray); $i++) { 
            $collection->push($jsonArray[$i]->idProducto);
        }
        return $collection;
    }

    public function getMiStock(){
    $id = Session::get('com_id');
        $id2 = Session::get('cmp_id');


$stocks=DB::select('select  idProducto FROM stock_branches sc where sc.idSucursal='.$id);


    $products = DB::table('products')
            ->leftJoin('productypes as pty','pty.idTipoProducto', '=','products.idTipoProducto')
            ->leftJoin('stock_branches', function ($join) {
            $join->on('products.idProducto', '=', 'stock_branches.idProducto')
                 ->where('stock_branches.idSucursal', '=', Session::get('com_id'));
             })  


            ->whereIn('products.idProducto',$this->toCollection($stocks))
            ->where('products.idEmpresa', '=',$id2)



            ->select('products.idProducto as idPro', 'products.nombreProducto', 'products.similarProducto', 'pty.nombreTipoProducto','stock_branches.idStockSucursal');

  
        return Datatables::of($products)->addColumn('action', function($product) {
                    return 
                    '<button value="'.$product->idStockSucursal.'" href="" title="Eliminar de mi Stock"
                    onclick="Eliminar(this)" 
                    class="btn btn-danger btn-xs">
                    <i class="glyphicon glyphicon-trash">
                    </i>Eliminar de mi Stock</button>';
                })
                ->make(true);
        
        }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->stock->delete();
         return response()->json([
                "mensaje"=>"Eliminado de la Lista"
            ]);
    }
}
