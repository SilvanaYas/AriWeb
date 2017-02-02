<?php

namespace Scpm\Http\Controllers;

use Illuminate\Http\Request;

use Scpm\Http\Requests;
use Scpm\Http\Controllers\Controller;
use Illuminate\Routing\Route;
use Scpm\User;
use Scpm\Rol;
use Scpm\Group;
use Session;
use Redirect;
use Auth;
use Scpm\Company;
use Mail;
use Datatables;
use DB;

class UserController extends Controller
{
    public function __construct(){
         $this->beforeFilter('@find',['only' => ['edit','update','destroy']]);
    }

    public function find(Route $route){
        $this->user = User::find($route->getParameter('user'));
        $this->notFound($this->user);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rols= Rol::Lists('nombreRol','idRol');         
        return view('administrador.index_user',compact('rols')); 
        
    }

    public function getUsuarios()
    {

    $users = User::select(['idUsuario', 'nombreUsuario','activo','apellidoUsuario','telefonoUsuario','email','idRol'])->where('users.idRol','<>', 1);       

         return Datatables::of($users)->addColumn('action', function($user) {
                    return 
                    '<a href="#edit/'.$user->idUsuario.'" title="Editar" class="btn btn-primary btn-xs"
                    onclick="Mostrar('.$user->idUsuario.')" 
                    class="" data-target="#myModal" data-toggle="modal">
                    <i class="glyphicon glyphicon-edit">
                    </i>   Editar</a>
                    <button value="'.$user->idUsuario.'" href="" title="Dar de Baja"
                    onclick="Eliminar(this)" 
                    class="btn btn-warning btn-xs">
                    <i class="glyphicon glyphicon-alert">
                    </i>   Dar de Baja</button>';

                })->editColumn('idRol',function($user){
                return $user->idRol==1? "Administrador":"Operador Económico";
                })
                ->editColumn('activo',function($user){
                return $user->activo==1? "Activo":"Desactivo";
                })
                  ->make(true);        

        }

}
