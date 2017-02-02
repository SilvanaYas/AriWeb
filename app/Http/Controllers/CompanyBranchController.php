<?php

namespace Scpm\Http\Controllers;

use Illuminate\Http\Request;

use Scpm\Http\Requests;
use Scpm\Http\Controllers\Controller;
use Illuminate\Routing\Route;
use Scpm\Company;
use Scpm\Group;
use Scpm\Location;
use Scpm\Branch;
use Scpm\Province;
use Session;
use Redirect;
use Auth;
use Datatables;

class CompanyBranchController extends Controller
{

    public function __construct(){
         $this->beforeFilter('@find',['only' => ['edit','update','destroy']]);
    }

    public function find(Route $route){
        $this->branch = Branch::find($route->getParameter('adminbranch'));
        $this->notFound($this->branch);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id_grupo = Session::get('gro_id');
        $cmp_id = Session::get('cmp_id');
        $perfil = Company::getPerfil($cmp_id);
        $sucursales = Company::getSucursales($cmp_id);
        $provinces = Province::lists('nombreProvincia','idProvincia');
    
            if($id_grupo ==1)
            {
                return view('company.gasolineras.sucursales',compact('sucursales','perfil'));
            }
            if($id_grupo ==2)
            {
                return view('company.farmacias.sucursales',compact('perfil','provinces'));
            }
            if($id_grupo ==3)
            {
                return view('company.bancos.sucursales',compact('sucursales','perfil'));
            }
    }


    public function getSucursales()
    {
    $cmp_id = Session::get('cmp_id');

    $branches = Branch::select(['branches.idSucursal','branches.nombreSucursal','branches.direccion','branches.latitud','branches.longitud','branches.telefono','branches.activo','branches.propietario','branches.email'])->where('branches.idEmpresa','=', $cmp_id);       

         return Datatables::of($branches)->addColumn('action', function($branch) {
                    return 
                    '<a href="adminbranch/'.$branch->idSucursal.'/edit/" title="Editar" class="btn btn-primary btn-xs">
                    <i class="glyphicon glyphicon-edit">
                    </i></a>

                    <button value="'.$branch->idSucursal.'" href="" title="Eliminar"
                    onclick="Eliminar(this)" 
                    class="btn btn-danger btn-xs">
                    <i class="glyphicon glyphicon-trash">
                    </i></button>';

                })->editColumn('activo',function($branch){
                return $branch->activo==1? "Activo":"Desactivo";
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
        $id_grupo = Session::get('gro_id');
        $provinces = Province::lists('nombreProvincia','idProvincia');
    
            if($id_grupo ==1)
            {
                return view('branch.gasolineras.form_create_branch',compact('provinces'));
            }
            if($id_grupo ==2)
            {
                return view('branch.farmacias.form_create_branch',compact('provinces'));
            }
            if($id_grupo ==3)
            {
                return view('branch.bancos.form_create_branch',compact('provinces'));

            }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cmp_id = Session::get('cmp_id');
        $usr_id = Session::get('usuario');

        $loc_id = Location::getLocation($request['idProvincia'],$request['idCanton'],$request['idParroquia']);

             Branch::create([
            'nombreSucursal'=>$request['nombreSucursal'],
            'direccion'=>$request['direccion'],
            'telefono'=>$request['telefono'],
            'latitud'=>$request['latitud'],
            'longitud'=>$request['longitud'],
            'propietario'=>$request['propietario'],
            'email'=>$request['email'],
            'activo'=>1,
            'idLocalizacion'=>$loc_id[0]->idLocalizacion,
            'idEmpresa'=>$cmp_id,
            ]);      

        Session::flash('message','Datos Registrados correctamente');
        return redirect::to('adminbranch');
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
    public function update(Request $request, $id)
    {
         $branch = Branch::find($id);
        $branch->fill($request->all());
        $branch->save();
        
        Session::flash('message','Datos editados correctamente');
        return Redirect::to('/adminbranch');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->branch->delete();

        return response()->json([
                "mensaje"=>"sucursal eliminada"
            ]);
    }

    public function getReporteSucursales($tipo)
    {
        $cmp_id = Session::get('cmp_id');
        $perfil = Company::getPerfil($cmp_id);
        $sucursales = Company::getSucursales($cmp_id);

        $bancos = Company::getBancos();
        $date = date('Y-m-d');
        $view =  \View::make('pdf.reporte_sucursales', compact('sucursales', 'perfil', 'date'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);

        if($tipo==1){
        return $pdf->stream('Sucursales');
        }
        if($tipo==2){
        return $pdf->download('Sucursales.pdf');
        }
    }
}
