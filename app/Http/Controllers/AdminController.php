<?php

namespace Scpm\Http\Controllers;

use Illuminate\Http\Request;

use Scpm\Http\Requests;
use Scpm\Http\Controllers\Controller;
use Illuminate\Routing\Route;
use Scpm\Http\Requests\UserUpdateRequest;
use Scpm\Http\Requests\UserCreateRequest;
use Scpm\User;
use Scpm\Rol;
use Scpm\Group;
use Session;
use Redirect;
use Auth;
use Scpm\Company;
use Mail;
use Datatables;


class AdminController extends Controller
{

    public function __construct(){
         $this->beforeFilter('@find',['only' => ['edit','update','destroy']]);
    }

    public function find(Route $route){
        $this->admin = User::find($route->getParameter('admin'));
        $this->notFound($this->admin);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id_usuario = Auth::user()->idUsuario;
        Session::put('usuario', $id_usuario);
        $rols= Rol::Lists('nombreRol','idRol');         
        return view('administrador.index_admin',compact('rols')); 
        
    }

   /*
    * ESte método .consulta todos los usuarios registrados en la AWOPEC
    */

    public function getAdmins()
    {

    $admins = User::select(['idUsuario', 'nombreUsuario','activo','apellidoUsuario','telefonoUsuario','email','idRol'])->where('users.idRol','=', 1);       

         return Datatables::of($admins)->addColumn('action', function($admin) {
                    return 
                    '<a href="#edit/'.$admin->idUsuario.'" title="Editar" class="btn btn-primary btn-xs"
                    onclick="Mostrar('.$admin->idUsuario.')" 
                    class="" data-target="#myModal" data-toggle="modal">
                    <i class="glyphicon glyphicon-edit">
                    </i>   Editar</a>
                        
                    <button value="'.$admin->idUsuario.'" href="" title="Dar de baja"
                    onclick="Eliminar(this)" 
                    class="btn btn-warning btn-xs">
                    <i class="glyphicon glyphicon-alert">
                    </i>   Dar de baja</button>';

                })->editColumn('idRol',function($admin){
                return $admin->idRol==1? "Administrador":"Operador Económico";
                })
                ->editColumn('activo',function($admin){
                return $admin->activo==1? "Activo":"Desactivo";
                })
                  ->make(true);        

        }

        //Este metodo trae todas las farmacias registradas en la aplicación web

        public function getFarmacias($id)
    {
        $farmacias = Company::Join('branches','branches.idEmpresa','=','companies.idEmpresa')
                    ->where('companies.idGrupo','=',$id)
                    ->select(array('branches.idSucursal','branches.nombreSucursal','branches.propietario','branches.email','branches.direccion','branches.telefono','branches.activo'));

        return Datatables::of($farmacias)
                ->editColumn('activo',function($farma){
                return $farma->activo==1? "Activo":"Desactivo";
                })
                ->make(true);
    }

      public function getGasolineras($id)
    {
    $gasolineras = Company::Join('branches','branches.idEmpresa','=','companies.idEmpresa')
                    ->where('companies.idGrupo','=',$id)
                    ->select(array('branches.idSucursal','branches.nombreSucursal','branches.propietario','branches.email','branches.direccion','branches.telefono','branches.activo'));

        return Datatables::of($gasolineras)
                ->editColumn('activo',function($gaso){
                return $gaso->activo==1? "Activo":"Desactivo";
                })
                ->make(true);
    }

      public function getBancos($id)
    {
        $bancos = Company::Join('branches','branches.idEmpresa','=','companies.idEmpresa')
                    ->where('companies.idGrupo','=',$id)
                    ->select(array('branches.idSucursal','branches.nombreSucursal','branches.propietario','branches.email','branches.direccion','branches.telefono','branches.activo'));

        return Datatables::of($bancos)
                ->editColumn('activo',function($banco){
                return $banco->activo==1? "Activo":"Desactivo";
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
        $rols= Rol::Lists('nombreRol','idRol');
            return view('administrador.form_create_user',['rols'=>$rols]);
            
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserCreateRequest $request)
    {
        if($request->ajax()){
            $user = new User;
            $data['nombreUsuario'] = $user->nombreUsuario= $request['nombreUsuario'];
            $data['apellidoUsuario'] = $user->apellidoUsuario= $request['apellidoUsuario'];
            $data['telefonoUsuario'] = $user->telefonoUsuario= $request['telefonoUsuario'];
            $data['confirm_token'] = $user->confirm_token= str_random(100);
            $data['email'] = $user->email= $request['email'];
            $data['password'] = $user->password = $request['password'];
            $user->remember_token = str_random(100);
            $data['idRol'] = $user->idRol= $request['idRol'];
            $user->save(); 

            Mail::send('layouts.confirm_email',['data'=>$data],function($msj) use ($data) {
                $msj->subject('Validar Cuenta');
                $msj->to($data['email'],$data['nombreUsuario'],$data['apellidoUsuario'],$data['password']);
            });
            return response()->json([
                "mensaje" => " usuario creado"
            ]);
        }
    }

      /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    
        $admin = User::find($id);
        return response()->json(
                $admin->toArray()

            );
  }

  public function show($id)
    {
            if($id ==1)
            {
                return view('administrador.grupos.gasolineras', compact('id'));
            }
            if($id ==2)
            {
                return view('administrador.grupos.farmacias', ['id' => $id]);
            }
            if($id ==3)
            {
                return view('administrador.grupos.bancos', compact('id'));
            }else
            {
                Session::flash('message','La ruta que intentas acceder no es correcta');
                return redirect::to('admin/2');
            }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, $id)
    {
        $admin = User::find($id);
        $admin->fill($request->all());
        $admin->save();

        return response()->json([
                "mensaje"=>"Usuario editado ok"
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
        $this->admin->delete();

        return response()->json([
                "mensaje"=>"Usuario eliminado"
            ]);
    }

    public function getReporteUsuarios($tipo)
    {
        $data = User::getUsuarios();
        $date = date('Y-m-d');
        $view =  \View::make('pdf.reporte_usuarios', compact('data', 'date'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);

        if($tipo==1){
            return $pdf->stream('Operadores Económicos');
        }
        if($tipo==2){
            return $pdf->download('Operadores Económicos.pdf');
        }

    }

    public function getReporteAdmin($tipo)
    {
        $data = User::getAdmin();
        $date = date('Y-m-d');
        $view =  \View::make('pdf.reporte_admin', compact('data', 'date'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);

        if($tipo==1){
        return $pdf->stream('Administradores AWOPEC');
        }
        if($tipo==2){
        return $pdf->download('Administradores AWOPEC.pdf');
        }
    }

    public function getReporteGasolineras($tipo)
    {
        $gasolineras = Company::getGasolineras();
        $date = date('Y-m-d');
        $view =  \View::make('pdf.reporte_gasolineras', compact('gasolineras', 'date'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);

        if($tipo==1){
        return $pdf->stream('Gasolineras');
        }
        if($tipo==2){
        return $pdf->download('Gasolineras.pdf');
        }
    }

    public function getReporteFarmacias($tipo)
    {
        $farmacias = Company::getFarmacias();
        $date = date('Y-m-d');
        $view =  \View::make('pdf.reporte_farmacias', compact('farmacias', 'date'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);

        if($tipo==1){
        return $pdf->stream('Farmacias');
        }
        if($tipo==2){
        return $pdf->download('Farmacias.pdf');
        }
    }

    public function getReporteBancos($tipo)
    {
        $bancos = Company::getBancos();
        $date = date('Y-m-d');
        $view =  \View::make('pdf.reporte_bancos', compact('bancos', 'date'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);

        if($tipo==1){
        return $pdf->stream('Bancos');
        }
        if($tipo==2){
        return $pdf->download('Bancos.pdf');
        }
    }
        
}
