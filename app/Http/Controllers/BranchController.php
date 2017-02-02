<?php

namespace Scpm\Http\Controllers;

use Illuminate\Http\Request;

use Scpm\Http\Requests;
use Scpm\Http\Requests\BranchCreateRequest;
use Scpm\Http\Controllers\Controller;
use Scpm\Province;
use Scpm\Canton;
use Scpm\Company;
use Scpm\Location;
use Scpm\Branch;
use Scpm\Group;
use Scpm\User;
use Scpm\Schedule;
use Scpm\Shift;
use Session;
use Redirect;
use Auth;

class BranchController extends Controller
{/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $id_usuario = Auth::user()->idUsuario;
        $nombre = Auth::user()->nombreUsuario;
        $apellido = Auth::user()->apellidoUsuario;
        $email = Auth::user()->email;
        $propietario = $nombre.' '.$apellido;

        $com_id = Auth::user()->idSucursal;
        $cmp_id = Auth::user()->idEmpresa;
        $id_usuario = Auth::user()->idUsuario;
        Session::put('cmp_id', $cmp_id);
        Session::put('usuario', $id_usuario);
        Session::put('com_id', $com_id);
        Session::put('propietario', $propietario);
        Session::put('email', $email);

        if ($com_id != NULL) { 

                $id_grupo = Company::getIdGrupo($cmp_id);
                Session::put('gro_id', $id_grupo[0]->idGrupo);
                $id_grupo = Session::get('gro_id');
                $path = Branch::getDatosSucursal($com_id);
                $img = Branch::getLogo($cmp_id);
                if($id_grupo ==1)
                    {
                        return view('branch.gasolineras.index',compact('path','img')); 
                    }
                    if($id_grupo ==2)
                    {
                        return view('branch.farmacias.index',compact('path','img')); 
                    }
                    if($id_grupo ==3)
                    {
                        return view('branch.bancos.index',compact('path','img')); 
                    }
        }else
        {
            return view('branch.forms.modal_index'); 
        }
    }

    public function getCantons(Request $request, $id){
               
        if($request->ajax()){
            $data = Location::cantons($id);
            return response()->json($data);
        }
    }

   public function getParishes(Request $request, $id){
              
        if($request->ajax()){
            $data = Location::parishes($id);
            return response()->json($data);
        }
    }

    /**
     * Crear una Empresa
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     public function create()
    {
        $provinces = Province::lists('nombreProvincia','idProvincia');
        return view('branch.form_create',compact('provinces'));
                
    }

    public function store(BranchCreateRequest $request)
    {
        $id = Session::get('usuario');
        $email = Session::get('email');
        $propietario = Session::get('propietario');
        $cmp_id = Session::get('cmp_id');
        $loc_id = Location::getLocation($request['idProvincia'],$request['idCanton'],$request['idParroquia']);

      $company = Branch::create([

            'nombreSucursal'=>$request['nombreSucursal'],
            'direccion'=>$request['direccion'],
            'telefono'=>$request['telefono'],
            'latitud'=>$request['latitud'],
            'longitud'=>$request['longitud'],
            'activo'=>1,
            'idLocalizacion'=>$loc_id[0]->idLocalizacion,
            'idEmpresa'=>$cmp_id,
            'propietario' => $propietario,
            'email'=>$email,

            ]);      

       $com_id = $company->idSucursal;
        $usuario = User::find($id);
        $usuario->fill(['idSucursal'=>$com_id,]);
        $usuario->save();

        Session::flash('message','Datos Registrados correctamente');
        return redirect::to('branch');                     
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $provinces = Province::lists('nombreProvincia','idProvincia');
        $company = Branch::find($id);
        $id_grupo = Session::get('gro_id');
            if($id_grupo ==1)
            {
                return view('branch.gasolineras.form_edit',compact('company','provinces'));
             }
            if($id_grupo ==2)
            {
                return view('branch.farmacias.form_edit',compact('company','provinces'));
            }
            if($id_grupo ==3)
            {
                return view('branch.bancos.form_edit',compact('company','provinces'));
            }

    }
        

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BranchCreateRequest $request, $id)
    {
        $company = Branch::find($id);
        $company->fill($request->all());
        $company->save();
        
        Session::flash('message','Datos editados correctamente');
        return Redirect::to('/branch');
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

    public function getSucursal($tipo)
    {
        $com_id = Session::get('com_id');
        $perfil = Branch::getDatosSucursal($com_id);
        $date = date('Y-m-d');
        $view =  \View::make('pdf.reporte_sucursal', compact('perfil', 'date'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);

        if($tipo==1){
        return $pdf->stream('Mi Empresa');
        }
        if($tipo==2){
        return $pdf->download('Mi Empresa.pdf');
        }
    }
}
