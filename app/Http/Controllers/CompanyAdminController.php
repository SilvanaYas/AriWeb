<?php

namespace Scpm\Http\Controllers;

use Illuminate\Http\Request;

use Scpm\Http\Requests;
use Scpm\Http\Controllers\Controller;
use Scpm\Http\Requests\UserCreateRequest;
use Illuminate\Routing\Route;
use Scpm\Company;
use Session;
use Redirect;
use Auth;
use Scpm\User;
use Mail;


class CompanyAdminController extends Controller
{

    public function __construct(){
         $this->beforeFilter('@find',['only' => ['edit','update','destroy']]);
    }

    public function find(Route $route){
        $this->user = User::find($route->getParameter('admincompany'));
        $this->notFound($this->user);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $id_grupo = Session::get('gro_id');
        
        if($id_grupo ==1)
        {
        return view('company.gasolineras.form_create_usr');
        }
        if($id_grupo ==2)
        {
        return view('company.farmacias.form_create_usr');
        }
        if($id_grupo ==3)
        {
        return view('company.bancos.form_create_usr');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserCreateRequest $request)
    {
        $cmp_id = Session::get('cmp_id');

        $user = new User;
            $data['nombreUsuario'] = $user->nombreUsuario= $request['nombreUsuario'];
            $data['apellidoUsuario'] = $user->apellidoUsuario= $request['apellidoUsuario'];
            $data['telefonoUsuario'] = $user->telefonoUsuario= $request['telefonoUsuario'];
            $data['confirm_token'] = $user->confirm_token= str_random(100);
            $data['email'] = $user->email= $request['email'];
            $data['password'] = $user->password = $request['password'];
            $user->remember_token = str_random(100);
            $data['idRol'] = $user->idRol= 3;
            $data['idEmpresa'] = $user->idEmpresa= $cmp_id;
;
            $user->save(); 

         Mail::send('layouts.confirm_email',['data'=>$data],function($msj) use ($data) {


            $msj->subject('Validar Cuenta');
            $msj->to($data['email'],$data['nombreUsuario'],$data['apellidoUsuario'],$data['password']);        });
   
        Session::flash('message','Usuario Creado Correctamente y correo enviado');
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
        $user = User::find($id);
        return response()->json(
                $user->toArray()
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
        $user = User::find($id);
        $user->fill($request->all());
        $user->save();

        return response()->json([
                "mensaje"=>"Operador actualizado"
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
        $this->user->delete();

        return response()->json([
                "mensaje"=>"Operador eliminado"
            ]);
    }
}
