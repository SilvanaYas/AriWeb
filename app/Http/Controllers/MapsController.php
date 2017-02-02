<?php

namespace Scpm\Http\Controllers;

use Illuminate\Http\Request;

use Scpm\Http\Requests;
use Scpm\Http\Controllers\Controller;
//use Illuminate\Routing\Route;
use Scpm\Company;
use Scpm\Province;
use Session;
use Redirect;
use Input;


class MapsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $provinces = Province::lists('nombreProvincia','idProvincia');
        return view('maps.index',compact('provinces'));
    }

    /*public function getFarmaciasM(){
        $provinces = Province::lists('nombreProvincia','idProvincia');
        return view('maps.index.index_farmacias',compact('provinces'));
    }

     public function getGasolinerasM(){
        $provinces = Province::lists('nombreProvincia','idProvincia');
        return view('maps.index.index_gasolineras',compact('provinces'));
    }

     public function getBancosM(){
        $provinces = Province::lists('nombreProvincia','idProvincia');
        return view('maps.index.index_bancos',compact('provinces'));
    }*/

    public function store(Request $request)
    {
        $farmacias = Company::getSucursales($request['id']);
        $provinces = Province::lists('nombreProvincia','idProvincia');      
        $informacion = $farmacias;
        return view('maps.farmacias',compact('farmacias','informacion','provinces'));
    }

    public function autocompleteg(Request $request)
    {
        $term = $request->term;
        $data = Company::where('nombreEmpresa','LIKE','%'.$term.'%')->where('idGrupo','=',1)
        ->take(10)
        ->get();
        $result = array();
        foreach ($data as $key => $value) {
            $result[] = ['id'=>$value->idEmpresa,'idGrupo'=>$value->idGrupo,'value'=>$value->nombreEmpresa];
        }
        return response()->json($result);
    }

    public function autocompletef(Request $request)
    {
        $term = $request->term;
        $data = Company::where('nombreEmpresa','LIKE','%'.$term.'%')->where('idGrupo','=',2)
        ->take(10)
        ->get();
        $result = array();
        foreach ($data as $key => $value) {
            $result[] = ['id'=>$value->idEmpresa,'value'=>$value->nombreEmpresa,'idGrupo'=>$value->idGrupo];
        }
        return response()->json($result);
    }

    public function autocompleteb(Request $request)
    {
        $term = $request->term;
        $data = Company::where('nombreEmpresa','LIKE','%'.$term.'%')->where('idGrupo','=',3)
        ->take(10)
        ->get();
        $result = array();
        foreach ($data as $key => $value) {
            $result[] = ['id'=>$value->idEmpresa,'idGrupo'=>$value->idGrupo,'value'=>$value->nombreEmpresa];
        }
        return response()->json($result);
    }
}
