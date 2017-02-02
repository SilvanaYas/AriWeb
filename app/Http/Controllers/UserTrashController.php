<?php

namespace Scpm\Http\Controllers;

use Illuminate\Http\Request;

use Scpm\Http\Requests;
use Scpm\Http\Controllers\Controller;
use Illuminate\Routing\Route;
use Session;
use Redirect;
use Auth;
use Scpm\User;
use Datatables;
use DB;

class UserTrashController extends Controller
{
    public function __construct(){
         $this->beforeFilter('@find',['only' => ['edit','update','destroy']]);
    }

    public function find(Route $route){
        $this->trashUser = User::onlyTrashed()->find($route->getParameter('userTrash'));
        $this->notFound($this->trashUser);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('administrador.index_trash'); 
    }

    public function getUsuario()
    {

    $users = User::onlyTrashed()->select(['idUsuario', 'nombreUsuario','activo','apellidoUsuario','telefonoUsuario','email','idRol']);       

         return Datatables::of($users)->addColumn('action', function($user) {
                    return 
                    '<button value="'.$user->idUsuario.'" href="" title="Habilitar"
                    onclick="Eliminar(this)" 
                    class="btn btn-success btn-xs">
                    <i class="glyphicon glyphicon-ok-circle">
                    </i>Habilitar</button>';

                })->editColumn('idRol',function($user){
                return $user->idRol==1? "Administrador":"Operador Económico";
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
        //
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
       // $user = User::onlyTrashed()->find($id);
        //$user->restore();
        $this->trashUser->restore();
        return response()->json([
                "mensaje"=>"Usuario Habilitado"
            ]);
    }
}
