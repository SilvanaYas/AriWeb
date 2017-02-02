<?php

namespace Scpm\Http\Controllers;

use Illuminate\Http\Request;

use Scpm\Http\Requests;
use Scpm\Http\Requests\ShiftCreateRequest;
use Scpm\Http\Controllers\Controller;
use Illuminate\Routing\Route;
use Scpm\Shift;
use Scpm\Branch;
use Session;
use Redirect;
use Auth;
use Datatables;
use Carbon\Carbon;


class ShiftController extends Controller
{

    public function __construct(){
         $this->beforeFilter('@find',['only' => ['edit','update','destroy']]);
    }

    public function find(Route $route){
        $this->shift = Shift::find($route->getParameter('shift'));
        $this->notFound($this->shift);
        
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $com_id = Session::get('com_id');
        $shifts = Shift::getTurnos($com_id);
        return view('shift.index', compact('shifts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('shift.form_create');
    }

public function getTurnos(){
        $com_id = Session::get('com_id');
 
        $shifts = Shift::select(['fechaInicio','fechaFin','horaInicio','horaFin','idTurno','activo'])->where('shifts.idSucursal','=',$com_id);
        
        return Datatables::of($shifts)->addColumn('action', function($shift) {
                    return 
                    '<a href="#edit/'.$shift->idTurno.'" title="Editar" class="btn btn-primary btn-xs"
                    onclick="Mostrar('.$shift->idTurno.')" 
                    class="" data-target="#myModal" data-toggle="modal">
                    <i class="glyphicon glyphicon-edit">
                    </i></a>
                  
                    <button value="'.$shift->idTurno.'" href="" title="Eliminar"
                    onclick="Eliminar(this)" 
                    class="btn btn-danger btn-xs">
                    <i class="glyphicon glyphicon-trash">
                    </i></button>';

                })->editColumn('activo',function($shift){
                    $date = Carbon::now();
                    $inicio = Carbon::parse($shift->fechaInicio);
                    $fechaFin = Carbon::parse($shift->fechaFin);
                    $fin = $fechaFin->addDay();
                
                    if ($date->between($inicio, $fin)) {
                    return'<button title="Activa" 
                    class="btn btn-success btn-xs">
                    <i class="glyphicon glyphicon-check">
                    </i>Activa</button>';

                    }else{
                         return'<button title="Activa" 
                    class="btn btn-default btn-xs">
                    <i class="glyphicon glyphicon-ban-circle">
                    </i>Inactiva</button>';
                    }
                                        
                })->make(true);
        
        }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ShiftCreateRequest $request)
    {

        $com_id = Session::get('com_id');
        if($request->ajax()){
            Shift::create([

                'fechaInicio'=>$request['fechaInicio'],
                'fechaFin'=>$request['fechaFin'],
                'horaInicio'=>$request['horaInicio'],
                'horaFin'=>$request['horaFin'],
                'idSucursal'=>$com_id,
                ]);
                return response()->json([
                    "mensaje" => "creado"
                ]);
        }
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
        $shift = Shift::find($id);
        return response()->json(
                $shift->toArray()
            );

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ShiftCreateRequest $request, $id)
    {
        $shift = Shift::find($id);
        $shift->fill($request->all());
        $shift->save();

        return response()->json([
                "mensaje"=>"turno Actualizado"
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
        $this->shift->delete();

        return response()->json([
                "mensaje"=>"borrado"
            ]);
    }

    public function getReporteTurnos($tipo)
    {
        $com_id = Session::get('com_id');
        $perfil = Branch::getDatosSucursal($com_id);
        //$products = Product::getProducts($cmp_id);
        $turnos = Shift::getTurnos($com_id);

        $date = date('Y-m-d');
        $view =  \View::make('pdf.reporte_turnos', compact('turnos', 'perfil', 'date'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);

        if($tipo==1){
        return $pdf->stream('Turnos');
        }
        if($tipo==2){
        return $pdf->download('Turnos.pdf');
        }
    }
}
