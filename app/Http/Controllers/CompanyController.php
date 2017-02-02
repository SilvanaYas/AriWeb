<?php

namespace Scpm\Http\Controllers;

use Illuminate\Http\Request;
use Scpm\Http\Requests;
use Scpm\Http\Requests\CompanyCreateRequest;
use Scpm\Http\Controllers\Controller;
use Illuminate\Routing\Route;
use Scpm\Company;
use Scpm\Location;
use Scpm\Representative;
use Scpm\Group;
use Scpm\User;
use Session;
use Redirect;
use Auth;
use PDF;
use Datatables;



class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cmp_id = Auth::user()->idEmpresa;
        $id_usuario = Auth::user()->idUsuario;
        Session::put('usuario', $id_usuario);
        Session::put('cmp_id', $cmp_id);


        if ($cmp_id != NULL) {

            $id_gru = Company::getIdGrupo($cmp_id);
            Session::put('gro_id', $id_gru[0]->idGrupo);
            $perfil = Company::getPerfil($cmp_id);
            $id_grupo = Session::get('gro_id');
    
            if($id_grupo ==1)
            {
            return view('company.gasolineras.index',compact('perfil'));
            }
            if($id_grupo ==2)
            {
            return view('company.farmacias.index',compact('perfil'));
            }
            if($id_grupo ==3)
            {
            return view('company.bancos.index',compact('perfil'));
            }
        }else
        {
            return view('company.forms.index');
        }
        

    }


    public function getSocios()
    {
    $cmp_id = Auth::user()->idEmpresa;
    $operadores = User::select(['idUsuario', 'nombreUsuario','activo','apellidoUsuario','telefonoUsuario','email'])->where('users.idEmpresa','=', $cmp_id);       

         return Datatables::of($operadores)->addColumn('action', function($user) {
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
                    </i>    Dar de Baja</button>';

                })->editColumn('activo',function($user){
                return $user->activo==1? "Activo":"Desactivo";
                })
                  ->make(true);        

        }

    /**
     * Crea un perfil de Empresa
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $groups= Group::Lists('nombreGrupo','idGrupo');
        return view('company.form_create',compact('groups'));

    }

    /**
     * Almacena los datos de perfil de una Empresa
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * 
     */

    public function store(CompanyCreateRequest $request)
    {        
        $id = Session::get('usuario');
        
       $cmp = Company::create([
            'nombreEmpresa'=>$request['nombreEmpresa'],
            'idGrupo'=>$request['idGrupo'],
            'logo'=>$request['logo'],
            'activo'=>1,
            ]);

        $cmp_id = $cmp->idEmpresa;
        $usuario = User::find($id);
        $usuario->fill(['idEmpresa'=>$cmp_id,]);
        $usuario->save();

        Session::flash('message','Datos Registrados correctamente');
        return redirect::to('/company');
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
        $profile = Company::find($id);
        $id_grupo = Session::get('gro_id');
        
        if($id_grupo ==1)
        {
        return view('company.gasolineras.form_edit_profile',compact('profile'));
        }
        if($id_grupo ==2)
        {
        return view('company.farmacias.form_edit_profile',compact('profile'));
        }
        if($id_grupo ==3)
        {
        return view('company.bancos.form_edit_profile',compact('profile'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CompanyCreateRequest $request, $id)
    {
        $profile = Company::find($id);
        $profile->fill($request->all());
        $profile->save();
        
        Session::flash('message','Datos editados Correctamente');
        return Redirect::to('company');
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

    public function getReporteEmpresa($tipo)
    {
        $cmp_id = Auth::user()->idEmpresa;
        $propietarios = Company::getSocios($cmp_id);
        $perfil = Company::getPerfil($cmp_id);
        $date = date('Y-m-d');
        $view =  \View::make('pdf.reporte_socios', compact('propietarios', 'date', 'perfil'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);

        if($tipo==1){
        return $pdf->stream('propietarios sucursales');
        }
        if($tipo==2){
        return $pdf->download('Propietarios Sucursales.pdf');
        }
    }
}
