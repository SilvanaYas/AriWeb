<?php

namespace Scpm\Http\Controllers;

use Illuminate\Http\Request;
use Scpm\Http\Requests\PresentationCreateRequest;
use Scpm\Http\Controllers\Controller;
use Illuminate\Routing\Route;
use Scpm\Presentation;
use Session;
use Redirect;
use Auth;
use Validator;
use Datatables;

class ProductPresentationController extends Controller
{

    public function __construct(){
         $this->beforeFilter('@find',['only' => ['edit','update','destroy']]);
    }

    public function find(Route $route){
        $this->presentation = Presentation::find($route->getParameter('presentation'));
        $this->notFound($this->presentation);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //return view('product.presentation.form_create');

        //Mi formulario en el video
        return view('presentation.form_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PresentationCreateRequest $request)
    {
            $pro_id =Session::get('pro_id');

            if($request->ajax()){
                Presentation::create([
                'nombrePresentacion'=>$request['nombrePresentacion'],
                'fabricante'=>$request['fabricante'],
                'unidadesPresentacion'=>$request['unidadesPresentacion'],
                'observacion'=>$request['observacion'],
                'precioPresentacion'=>$request['precioPresentacion'],
                'precioUnidad'=>$request['precioUnidad'],
                'idProducto'=>$pro_id,

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

    public function getPresentaciones($id)
    {

    $presentations = Presentation::where('presentations.idProducto','=',$id)
                    ->select(array('presentations.idPresentacion','presentations.nombrePresentacion','presentations.fabricante','presentations.unidadesPresentacion','presentations.precioPresentacion','presentations.precioUnidad','presentations.observacion'));

        return Datatables::of($presentations)->addColumn('action', function($presentation) {
                    return 
                    '<a href="#edit/'.$presentation->idPresentacion.'" title="Editar" class="btn btn-primary btn-xs"
                    onclick="Mostrar('.$presentation->idPresentacion.')" 
                    class="" data-target="#myModal" data-toggle="modal">
                    <i class="glyphicon glyphicon-edit">
                    </i></a>
                        
                    <button value="'.$presentation->idPresentacion.'" href="" title="Eliminar"
                    onclick="Eliminar(this)" 
                    class="btn btn-danger btn-xs">
                    <i class="glyphicon glyphicon-trash">
                    </i></button>';
                })
                ->make(true);
    }

    public function show($id)
    {
        Session::put('pro_id',$id);
        $presentations = Presentation::getPresentations($id);
        //return view('presentation.index',compact('presentations','id'));
        return view('presentation.index',compact('id','presentations'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $presentation = Presentation::find($id);
        return response()->json(
                $presentation->toArray()
            );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PresentationCreateRequest $request, $id)
    {
        $presentation = Presentation::find($id);
        $presentation->fill($request->all());
        $presentation->save();

        return response()->json([
                "mensaje"=>"presentacion actualizada"
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

        $this->presentation->delete();

        return response()->json([
                "mensaje"=>"Presentacion eliminada"
            ]);
    }
}


