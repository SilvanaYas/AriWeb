<?php

namespace Scpm\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Scpm\Http\Requests;
use Scpm\Http\Requests\PromotionCreateRequest;
use Scpm\Http\Controllers\Controller;
use Scpm\Presentation;
use Scpm\Promotion;
use Scpm\Product;
use Session;
use Redirect;
use Auth;
use Datatables;
use Carbon\Carbon;


class ProductPromoController extends Controller
{

    public function __construct(){
         $this->beforeFilter('@find',['only' => ['edit','update','destroy']]);
    }

    public function find(Route $route){
        $this->promotion = Promotion::find($route->getParameter('promotion'));
        $this->notFound($this->promotion);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*$date = Carbon::now();
        $date2 = Carbon::now();
        $hoy = $date->format('Y,m,d');

        $anterior = $date->subDays(5)->format('Y-m-d');
        $siguiente = $date2->addDays(5)->format('Y-m-d');
        //return $date2->format('Y-m-d');
        //return $anterior.''.$siguiente;

        $first = Carbon::create(2012, 9, 5)->toDateString();
        return $first;
        $second = Carbon::create(2012, 9, 5)->toDateString();
        $res = var_dump(Carbon::create(2012, 9, 5, 3)->between($first, $second));
        return $res;*/

        //$promotions = Promotion::getPromociones($cmp_id);
        return view('promotion.promociones');
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('promotion.form_create');
    }

    public function getPromociones($id)
    {

    $id = Session::get('pre_id');
    $promotions = Promotion::where('promotions.idPresentacion','=',$id)
                    ->select(array('promotions.idPromocion','promotions.nombrePromocion','promotions.descripcion','promotions.fechaInicioPromo','promotions.fechaFinPromo','promotions.activo'));

        return Datatables::of($promotions)->addColumn('action', function($promotion) {
                    return 
                    '<a href="#edit/'.$promotion->idPromocion.'" title="Editar" class="btn btn-primary btn-xs"
                    onclick="Mostrar('.$promotion->idPromocion.')" 
                    class="" data-target="#myModal" data-toggle="modal">
                    <i class="glyphicon glyphicon-edit">
                    </i></a>
                        
                    <button value="'.$promotion->idPromocion.'" href="" title="Eliminar"
                    onclick="Eliminar(this)" 
                    class="btn btn-danger btn-xs">
                    <i class="glyphicon glyphicon-trash">
                    </i></button>';
                })
                ->make(true);
    }

    public function listaPromociones()
    {

    $cmp_id = Session::get('cmp_id');
    $promotions = Product::Join('presentations','presentations.idProducto','=','products.idProducto')
                    ->Join('promotions','promotions.idPresentacion','=','presentations.idPresentacion')
                    ->where('products.idEmpresa','=',$cmp_id)
                    ->select(array('products.nombreProducto','presentations.nombrePresentacion','promotions.nombrePromocion','promotions.descripcion','promotions.fechaInicioPromo','promotions.fechaFinPromo','promotions.idPromocion','promotions.activo'));

        return Datatables::of($promotions)->addColumn('action', function($promotion) {
                    return 
                    '<a href="#edit/'.$promotion->idPromocion.'" title="Editar" class="btn btn-primary btn-xs"
                    onclick="Mostrar('.$promotion->idPromocion.')" 
                    class="" data-target="#myModal" data-toggle="modal">
                    <i class="glyphicon glyphicon-edit">
                    </i></a>
                        
                    <button value="'.$promotion->idPromocion.'" href="" title="Eliminar"
                    onclick="Eliminar(this)" 
                    class="btn btn-danger btn-xs">
                    <i class="glyphicon glyphicon-trash">
                    </i></button>';
                })
                ->make(true);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PromotionCreateRequest $request)
    {
        $pre_id = Session::get('pre_id');

            if($request->ajax()){
                Promotion::create([
                'nombrePromocion'=>$request['nombrePromocion'],
                'descripcion'=>$request['descripcion'],
                'fechaInicioPromo'=>$request['fechaInicioPromo'],
                'fechaFinPromo'=>$request['fechaFinPromo'],
                'idPresentacion'=>$pre_id,
                ]);
                return response()->json([
                "mensaje" => "creado"
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
        Session::put('pre_id',$id);
        //$promotions = Promotion::getPromotions($id);
        //return $promotions;
        return view('promotion.index',compact('id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $promotion = Promotion::find($id);
        return response()->json(
                $promotion->toArray()
            );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PromotionCreateRequest $request, $id)
    {

        $promotion = Promotion::find($id);
        $promotion->fill($request->all());
        $promotion->save();

        return response()->json([
                "mensaje"=>"Promocion actualizada"
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
        $this->promotion->delete();

        return response()->json([
                "mensaje"=>"promocion borrada"
            ]);
    }
}
