<?php

namespace Scpm\Http\Controllers;

use Illuminate\Http\Request;
use Scpm\Http\Requests;
use Scpm\Http\Controllers\Controller;
use Illuminate\Routing\Route;
use Scpm\Product;
use Scpm\StockBranch;
use Scpm\Branch;
use Session;
use Redirect;
use Auth;
use DB;
use Datatables;

class StockProductController extends Controller
{
    
    public function __construct(){
         $this->beforeFilter('@find',['only' => ['edit','update','destroy']]);
    }

    public function find(Route $route){
        $this->stock = StockBranch::find($route->getParameter('stock'));
        $this->notFound($this->stock);
        
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $com_id = Session::get('com_id');
        //$products = Product::getProducts2($com_id);
       //return view('stock.index',compact('products'));
        return view('stock.stock_index');
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

    public function getStock(){
    $id = Session::get('com_id');
        $id2 = Session::get('cmp_id');


$stocks=DB::select('select  idProducto FROM stock_branches sc where sc.idSucursal='.$id);


    $products = DB::table('products')
            ->leftJoin('productypes as pty','pty.idTipoProducto', '=','products.idTipoProducto')
            ->leftJoin('stock_branches', function ($join) {
            $join->on('products.idProducto', '=', 'stock_branches.idProducto')
                 ->where('stock_branches.idSucursal', '=', Session::get('com_id'));
             })  


            ->whereNotIn('products.idProducto',$this->toCollection($stocks))
            ->where('products.idEmpresa', '=',$id2)



            ->select('products.idProducto', 'products.nombreProducto', 'products.similarProducto', 'pty.nombreTipoProducto');

  
        return Datatables::of($products)->addColumn('action', function($product) {
                    return 
                    
        '<input type="checkbox" name="customer_id[]" class="delete_customer" value="'.$product->idProducto.'">';

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
        $com_id = Session::get('com_id'); 
        $suma = count($request->id);  

        if($request->ajax()){
            for ($i=0; $i < $suma; $i++) { 
                $pro_id = $request->id[$i];
                StockBranch::create([
                    'idProducto'=>$pro_id,
                    'idSucursal'=>$com_id,          
                    ]);  
        }    
           return response()->json([
                "mensaje" => "productos registrados"
            ]);
    }
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
        //
    }
    public function getMisProductos($tipo)
    {
        $com_id = Session::get('com_id');
        $perfil = Branch::getDatosSucursal($com_id);
        //$products = Product::getProducts($cmp_id);
        $products = Product::getProducts3($com_id);

        $date = date('Y-m-d');
        $view =  \View::make('pdf.reporte_MiStock', compact('products', 'perfil', 'date'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);

        if($tipo==1){
        return $pdf->stream('MiStock');
        }
        if($tipo==2){
        return $pdf->download('MiStock.pdf');
        }
    }
}
