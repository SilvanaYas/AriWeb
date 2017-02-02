<?php

namespace Scpm\Http\Controllers;

use Illuminate\Http\Request;

use Scpm\Http\Requests;
use Scpm\Http\Requests\RolCreateRequest;
use Scpm\Http\Controllers\Controller;
use Scpm\Rol;
use Illuminate\Routing\Route;
use Session;
use Redirect;
use Datatables;

class RolController extends Controller
{
     public function __construct(){
         $this->beforeFilter('@find',['only' => ['edit','update','destroy']]);
    }

    public function find(Route $route){
        $this->rol = Rol::find($route->getParameter('perfil'));
        $this->notFound($this->rol);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {

        return view('rol.index');

    }

    public function getPerfil(){
 
        $rols = Rol::select(['idRol', 'nombreRol']);
        return Datatables::of($rols)->addColumn('action', function($rol) {
                    return 
                    '<a href="#edit/'.$rol->idRol.'" title="Editar" class="btn btn-primary btn-xs"
                    onclick="Mostrar('.$rol->idRol.')" 
                    class="" data-target="#myModal" data-toggle="modal">
                    <i class="glyphicon glyphicon-edit">
                    </i>Editar</a>';
                })->make(true);
        
        }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('rol.form_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RolCreateRequest $request)
    {
        if($request->ajax()){
            Rol::create($request->all());
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

    $rol = Rol::find($id);
        return response()->json(
                $rol->toArray()
            );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RolCreateRequest $request, $id)
    {
        $rol = Rol::find($id);
        $rol->fill($request->all());
        $rol->save();

        return response()->json([
                "mensaje"=>"listo"
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
        $this->rol->delete();

        return response()->json([
                "mensaje"=>"borrado"
            ]);
    }
}
