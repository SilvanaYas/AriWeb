<?php

namespace Scpm\Http\Controllers;

use Illuminate\Http\Request;

use Scpm\Http\Requests;
use Scpm\Http\Requests\GroupCreateRequest;
use Scpm\Http\Controllers\Controller;
use Illuminate\Routing\Route;
use Session;
use Redirect;
use Scpm\Group;
use Auth;
use Scpm\Company;
use Datatables;

class GroupController extends Controller
{
     public function __construct(){
         $this->beforeFilter('@find',['only' => ['edit','update','destroy']]);
    }

    public function find(Route $route){
        $this->group = Group::find($route->getParameter('group'));
        $this->notFound($this->group);
        
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    


    public function index()
    {       
        return view('group.index');
    }

    public function getGrupos(){
 
        $groups = Group::select(['idGrupo', 'nombreGrupo']);
        return Datatables::of($groups)->addColumn('action', function($group) {
                    return 
                    '<a href="#edit/'.$group->idGrupo.'" title="Editar" class="btn btn-primary btn-xs"
                    onclick="Mostrar('.$group->idGrupo.')" 
                    class="" data-target="#myModal" data-toggle="modal">
                    <i class="glyphicon glyphicon-edit">
                    </i></a>
                        
                    <button value="'.$group->idGrupo.'" href="" title="Eliminar"
                    onclick="Eliminar(this)" 
                    class="btn btn-danger btn-xs">
                    <i class="glyphicon glyphicon-trash">
                    </i></button>';
                })->make(true);
        
        }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('group.form_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GroupCreateRequest $request)
    {
        if($request->ajax()){
            Group::create($request->all());
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

    $group = Group::find($id);
        return response()->json(
                $group->toArray()
            );
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
        $group = Group::find($id);
        $group->fill($request->all());
        $group->save();

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
        $this->group->delete();
         return response()->json([
                "mensaje"=>"borrado"
            ]);
    }
}
