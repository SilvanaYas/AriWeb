<?php

namespace Scpm\Http\Controllers;

use Illuminate\Http\Request;

use Scpm\Http\Requests;
use Scpm\Http\Controllers\Controller;
use Illuminate\Routing\Route;
use Scpm\Company;
use Scpm\Branch;
use Scpm\Location;
use Scpm\Province;
use Session;
use Redirect;

class AriController extends Controller
{

    public function index(){
        return "Hola";
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request['idGrupof'] != null) {
            $id_grupo = $request['idGrupof'];
            $id_com = $request['idf'];
            $busqueda = $request['nombref'];
        }
        if ($request['idGrupog'] != null) {
            $id_grupo = $request['idGrupog'];
            $id_com = $request['idg'];
            $busqueda = $request['nombreg'];
        }
        if ($request['idGrupob'] != null) {
            $id_grupo = $request['idGrupob'];
            $id_com = $request['idb'];
            $busqueda = $request['nombre'];
        }


        $sucursales = Company::getSucursales($id_com);
        if (count($sucursales)>0) {
            return Redirect::action('AriController@mostrar',array($id_grupo,$id_com));
        }
        else
        {
            if ($id_grupo ==1) {
            return Redirect::back()->with('msjg', 'No existen resultados para  '.$busqueda);
            }
            if ($id_grupo ==2) {
            return Redirect::back()->with('msjf', 'No existen resultados para  '.$busqueda);
            }
            if ($id_grupo ==3) {
            return Redirect::back()->with('msjb', 'No existen resultados para  '.$busqueda);
            }
        }  
    }

    public function mostrar($id, $id_com){
        if($id == 1){
            $gasolineras = Company::getSucursales($id_com);
            $provinces = Province::lists('nombreProvincia','idProvincia');      
            $informacion = $gasolineras;
            return view('maps.gasolineras',compact('gasolineras','informacion','provinces'));
        }
        if($id == 2){
            $farmacias = Company::getSucursales($id_com);
            $provinces = Province::lists('nombreProvincia','idProvincia');      
            $informacion = $farmacias;
            return view('maps.farmacias',compact('farmacias','informacion','provinces'));
        }
         if($id == 3){
            $bancos = Company::getSucursales($id_com);
            $provinces = Province::lists('nombreProvincia','idProvincia');      
            $informacion = $bancos;
            return view('maps.bancos',compact('bancos','informacion','provinces'));
        }else{
            abort(404);
        }
    }

    public function postFarmacia(Request $request)
    {

        $loc_id = Location::getLocation($request['idProvincia'],$request['idCanton'],$request['idParroquia']);
        $provinces = Province::lists('nombreProvincia','idProvincia');
        $id_loc = $loc_id[0]->idLocalizacion;
        $farmacias = Branch::getLocFarmacias($id_loc);
        $informacion = $farmacias;
        return view('maps.farmacias',compact('farmacias','informacion','provinces'));
    }

    public function postGasolinera(Request $request)
    {
        
        $loc_id = Location::getLocation($request['idProvincia'],$request['idCanton'],$request['idParroquia']);
        $provinces = Province::lists('nombreProvincia','idProvincia');
        $id_loc = $loc_id[0]->idLocalizacion;
        $gasolineras = Branch::getLocGasolineras($id_loc);
        $informacion = $gasolineras;
        return view('maps.gasolineras',compact('gasolineras','informacion','provinces'));
    }

    public function postBanco(Request $request)
    {
        
        $loc_id = Location::getLocation($request['idProvincia'],$request['idCanton'],$request['idParroquia']);
        $provinces = Province::lists('nombreProvincia','idProvincia');
        $id_loc = $loc_id[0]->idLocalizacion;
        $bancos = Branch::getLocBancos($id_loc);
        $informacion = $bancos;
        return view('maps.bancos',compact('bancos','informacion','provinces'));
    }

        public function getGasoCercanas($lat, $lon){
            $gasoCercanas = Branch::getGasoCercanas($lat, $lon);
            return response()->json($gasoCercanas);
        }
}
