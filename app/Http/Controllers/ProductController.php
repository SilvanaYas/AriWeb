<?php

namespace Scpm\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Scpm\Http\Requests;
use Scpm\Http\Requests\ProductCreateRequest;
use Scpm\Http\Controllers\Controller;
use Scpm\Productype;
use Scpm\Presentation;
use Scpm\Product;
use Scpm\Category;
use Scpm\Company;
use Session;
use Redirect;
use Auth;
use Input;
use DB;
use Maatwebsite\Excel\Facades\Excel;
use PDF;
use Datatables;

class ProductController extends Controller
{

     public function __construct(){
         $this->beforeFilter('@find',['only' => ['edit','update','destroy']]);
    }

    public function find(Route $route){
        $this->product = Product::find($route->getParameter('product'));
        $this->notFound($this->product);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $cmp_id = Session::get('cmp_id');
        $gro_id = Session::get('gro_id');
        $tipos = Productype::getTipoProductos($gro_id);
        if ($gro_id == 1) {
            return view('product.gasolineras.index',compact('tipos'));
        }
        if ($gro_id == 2) {
            return view('product.farmacias.index',compact('tipos'));
        }

    }
    /*INDEX CON AJAX PRODUCTOS*/
    public function getProducts(){
            $cmp_id = Session::get('cmp_id');

$products = Product::Join('productypes','productypes.idTipoProducto','=','products.idTipoProducto')
                    ->where('products.idEmpresa','=',$cmp_id)
                    ->select(array('products.idProducto','products.nombreProducto','products.similarProducto','products.idTipoProducto','products.idEmpresa','productypes.nombreTipoProducto'));

        return Datatables::of($products)->addColumn('action', function($product) {
                    return 
                    '<a href="#edit/'.$product->idProducto.'" title="Editar" class="btn btn-primary btn-xs"
                    onclick="Mostrar('.$product->idProducto.')" 
                    class="" data-target="#myModal" data-toggle="modal">
                    <i class="glyphicon glyphicon-edit">
                    </i></a>

                    <button value="'.$product->idProducto.'" href="" title="Eliminar"
                    onclick="Eliminar(this)" 
                    class="btn btn-danger btn-xs">
                    <i class="glyphicon glyphicon-trash">
                    </i></button>';
                })
                ->addColumn('presentation', function($product) {
                    return 
                    '<a href="presentation/'.$product->idProducto.'" title="Agregar Presentacion">
                    <i class="glyphicon glyphicon-circle-arrow-right">
                    </i>Agregar Presentación</a>';
                })
                ->make(true);
        
        }

public function getProductGaso(){
    $cmp_id = Session::get('cmp_id');

    $products = Product::Join('productypes','productypes.idTipoProducto','=','products.idTipoProducto')
                    ->Join('presentations','presentations.idProducto','=','products.idProducto')
                    ->where('products.idEmpresa','=',$cmp_id)
                    ->select(array('products.idProducto','products.nombreProducto','products.idTipoProducto','products.idEmpresa','productypes.nombreTipoProducto','presentations.idPresentacion','presentations.nombrePresentacion','presentations.fabricante','presentations.precioPresentacion'));

        return Datatables::of($products)->addColumn('action', function($product) {
                    return 
                    '<a href="#edit/'.$product->idProducto.'" title="Editar" class="btn btn-primary btn-xs"
                    onclick="Mostrar('.$product->idProducto.','.$product->idPresentacion.')" 
                    class="" data-target="#myModal" data-toggle="modal">
                    <i class="glyphicon glyphicon-edit">
                    </i></a>
                        
                    <button value="'.$product->idProducto.','.$product->idPresentacion.'" href="" title="Eliminar"
                    onclick="Eliminar(this)" 
                    class="btn btn-danger btn-xs">
                    <i class="glyphicon glyphicon-trash">
                    </i></button>';
                })
                ->addColumn('promotion', function($product) {
                    return 
                    '<a href="promotion/'.$product->idPresentacion.'" title="Agregar Promoción">
                    <i class="glyphicon glyphicon-circle-arrow-right">
                    </i>Agregar Promoción</a>';
                })
                ->make(true);
        
        }
        
    /*Importar archivos CSV a la base de datos*/

    public function postImport()
    {
        Excel::load(Input::file('customer'), function($reader) {
            $cmp_id = Session::get('cmp_id');
            foreach ($reader->get() as $book) {
                Product::create([
                    'nombreProducto' => $book->producto,
                    'similarProducto' => $book->similar,
                    'idTipoProducto' => $book->tipo,
                    'idEmpresa' => $cmp_id,
                ]);
            }
        });
        Session::flash('message','Importacion realizada correctamente');
        return Redirect::to('product');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cmp_id = Session::get('cmp_id');
        $gro_id = Session::get('gro_id');
        $tipos = Productype::getTipoProductos($gro_id);
        if ($gro_id ==1) {
            return view('product.gasolineras.form_create',compact('tipos'));
        }
        if ($gro_id ==2) {
            return view('product.farmacias.form_create',compact('tipos'));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductCreateRequest $request)
    {
        $cmp_id = Session::get('cmp_id');
        $gro_id = Session::get('gro_id');


        if($request->ajax()){

          if ($gro_id == 1) {
                $product = Product::create([
                'nombreProducto'=>$request['nombreProducto'],
                'idTipoProducto'=>$request['idTipoProducto'],
                'idEmpresa'=>$cmp_id,
                ]);

               $pro_id = $product->idProducto;
               Presentation::create([
                'nombrePresentacion'=>$request['nombrePresentacion'],
                'fabricante'=>$request['fabricante'],
                'precioPresentacion'=>$request['precioPresentacion'],
                'idProducto'=>$pro_id,
                ]);
           } 

           if ($gro_id == 2) {
            $product = Product::create([
                'nombreProducto'=>$request['nombreProducto'],
                'similarProducto'=>$request['similarProducto'],
                'idTipoProducto'=>$request['idTipoProducto'],
                'idEmpresa'=>$cmp_id,
                ]);

           }
           return response()->json([
                "mensaje" => "PRODUCTO CREADO"
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
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $product = Product::find($id);
        return response()->json(
                $product->toArray()
            );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductCreateRequest $request, $id)
    {
        $product = Product::find($id);
        $product->fill($request->all());
        $product->save();

        return response()->json([
                "mensaje"=>"Producto actualizado"
            ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $this->product->delete();
        return response()->json([
                "mensaje"=>"producto borrado"
            ]);
    }

    public function getReporteProductos($tipo)
    {
        $cmp_id = Session::get('cmp_id');
        $perfil = Company::getPerfil($cmp_id);
        //$products = Product::getProducts($cmp_id);
        $products = Product::getProducts($cmp_id);

        $date = date('Y-m-d');
        $view =  \View::make('pdf.reporte_productos', compact('products', 'perfil', 'date'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);

        if($tipo==1){
        return $pdf->stream('Productos');
        }
        if($tipo==2){
        return $pdf->download('Productos.pdf');
        }
    }

    public function getReporteCombustibles($tipo)
    {
        $cmp_id = Session::get('cmp_id');
        $perfil = Company::getPerfil($cmp_id);
        $products = Product::getProductGaso($cmp_id);

        $date = date('Y-m-d');
        $view =  \View::make('pdf.reporte_combustibles', compact('products', 'perfil', 'date'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);

        if($tipo==1){
        return $pdf->stream('Combustibles');
        }
        if($tipo==2){
        return $pdf->download('Combustibles.pdf');
        }
    }
}

         