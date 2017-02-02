<?php

namespace Scpm\Http\Controllers;

use Illuminate\Http\Request;

use Scpm\Http\Requests;
use Scpm\Http\Requests\ProductypeCreateRequest;
use Scpm\Http\Controllers\Controller;
use Illuminate\Routing\Route;
use Session;
use Redirect;
use Scpm\Group;
use Scpm\Productype;
use Datatables;

class ProductypeController extends Controller
{

    public function __construct(){
         $this->beforeFilter('@find',['only' => ['edit','update','destroy']]);
    }

    public function find(Route $route){
        $this->type = Productype::find($route->getParameter('type'));
        $this->notFound($this->type);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groups = Group::Lists('nombreGrupo','idGrupo');
        return view('productype.index',compact('groups'));
    }

    public function getTipoProducto(){
 
        $ptys = Productype::select(['idTipoProducto', 'nombreTipoProducto','idGrupo']);

        return Datatables::of($ptys)->addColumn('action', function($pty) {
                    return 
                    '<a href="#edit/'.$pty->idTipoProducto.'" title="Editar" class="btn btn-primary btn-xs"
                    onclick="Mostrar('.$pty->idTipoProducto.')" 
                    class="" data-target="#myModal" data-toggle="modal">
                    <i class="glyphicon glyphicon-edit">
                    </i></a>

                    <button value="'.$pty->idTipoProducto.'" href="" title="Eliminar"
                    onclick="Eliminar(this)" 
                    class="btn btn-danger btn-xs">
                    <i class="glyphicon glyphicon-trash">
                    </i></button>';
                })
                ->editColumn('idGrupo',function($pty){
                if($pty->idGrupo ==1){ return "GASOLINERAS";}
                if($pty->idGrupo ==2){ return "FARMACIAS";}
                if($pty->idGrupo ==3){ return "BANCOS";}
                })
                ->make(true);
        
        }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $groups = Group::Lists('nombreGrupo','idGrupo');
        return view('productype.form_create',compact('groups'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductypeCreateRequest $request)
    {
        if($request->ajax()){
            Productype::create($request->all());
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
        $pty = Productype::find($id);
        return response()->json(
                $pty->toArray()
            );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductypeCreateRequest $request, $id)
    {
        $pty = Productype::find($id);
        $pty->fill($request->all());
        $pty->save();

        return response()->json([
                "mensaje"=>"listo",
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
        $this->type->delete();
        //$message = $this->type->nombreTipoProducto . ' fue eliminado de nuestros registros';
        return response()->json([
                'mensaje'=>'Eliminado'
                //'message' => $message
            ]);
        //Session::flash('message', $message);

    }
}
