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
use Scpm\Company;
use Datatables;
use DB;

class CompanyTrashController extends Controller
{

    public function __construct(){
         $this->beforeFilter('@find',['only' => ['edit','update','destroy']]);
    }

    public function find(Route $route){
        $this->trashUser = User::onlyTrashed()->find($route->getParameter('operadoresTrash'));
        $this->notFound($this->trashUser);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cmp_id = Session::get('cmp_id');
        $id_grupo = Session::get('gro_id');
        $perfil = Company::getPerfil($cmp_id);
    
            if($id_grupo ==1)
            {
            return view('company.gasolineras.index_trash',compact('perfil'));
            }
            if($id_grupo ==2)
            {
            return view('company.farmacias.index_trash',compact('perfil'));
            }
            if($id_grupo ==3)
            {
            return view('company.bancos.index_trash',compact('perfil'));
            }
    }

    public function getSociosEliminados()
    {
    $cmp_id = Auth::user()->idEmpresa;
    $operadores = User::onlyTrashed()->select(['idUsuario', 'nombreUsuario','activo','apellidoUsuario','telefonoUsuario','email','deleted_at'])->where('users.idEmpresa','=', $cmp_id);       

         return Datatables::of($operadores)->addColumn('action', function($user) {
                    return 
                    '<button value="'.$user->idUsuario.'" href="" title="Habilitar"
                    onclick="Eliminar(this)" 
                    class="btn btn-success btn-xs">
                    <i class="glyphicon glyphicon-ok-circle">
                    </i>Habilitar</button>';

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
        $this->trashUser->restore();
        return response()->json([
                "mensaje"=>"Usuario Habilitado"
            ]);
    }
}
