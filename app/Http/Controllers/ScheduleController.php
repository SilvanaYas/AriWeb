<?php

namespace Scpm\Http\Controllers;

use Illuminate\Http\Request;

use Scpm\Http\Requests;
use Scpm\Http\Controllers\Controller;
use Scpm\Http\Requests\ScheduleCreateRequest;
use Illuminate\Routing\Route;
use Scpm\Scheduletype;
use Scpm\Schedule;
use Session;
use Redirect;
use Auth;
use Datatables;

class ScheduleController extends Controller
{

    public function __construct(){
         $this->beforeFilter('@find',['only' => ['edit','update','destroy']]);
    }

    public function find(Route $route){
        $this->schedule = Schedule::find($route->getParameter('schedule'));
        $this->notFound($this->schedule);
        
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('schedule.index');
    }

    public function getHorarios(){
        $com_id = Session::get('com_id');
 
        $schedules = Schedule::select(['idHorario','descripcion','horaInicioHorario','horaFinHorario'])->where('schedules.idSucursal','=',$com_id);
        
        return Datatables::of($schedules)->addColumn('action', function($schedule) {
                    return 
                    '<a href="#edit/'.$schedule->idHorario.'" title="Editar" class="btn btn-primary btn-xs"
                    onclick="Mostrar('.$schedule->idHorario.')" 
                    class="" data-target="#myModal" data-toggle="modal">
                    <i class="glyphicon glyphicon-edit">
                    </i></a>

                    <button value="'.$schedule->idHorario.'" href="" title="Eliminar"
                    onclick="Eliminar(this)" 
                    class="btn btn-danger btn-xs">
                    <i class="glyphicon glyphicon-trash">
                    </i></button>';
                })->addColumn('active', function($schedule) {
                    return 
                    '<a href="#edit/'.$schedule->idHorario.'" title="Editar"
                    onclick="Mostrar('.$schedule->idHorario.')" 
                    class="" data-target="#myModal" data-toggle="modal">
                    <i class="glyphicon glyphicon-edit">
                    </i></a>';
                })->make(true);
        
        }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('schedule.form_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ScheduleCreateRequest $request)
    {
        $com_id = Session::get('com_id');

        if($request->ajax()){
            Schedule::create([
                'descripcion' => $request['descripcion'].' a '.$request['descripcion2'],
                'horaInicioHorario'=>$request['horaInicioHorario'],
                'horaFinHorario'=>$request['horaFinHorario'],
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
        $schedule = Schedule::find($id);
        return response()->json(
                $schedule->toArray()
            );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ScheduleCreateRequest $request, $id)
    {
        $schedule = Schedule::find($id);
        $schedule->fill($request->all());
        $schedule->save();

        return response()->json([
                "mensaje"=>"horario Actualizado"
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
        $this->schedule->delete();

        return response()->json([
                "mensaje"=>"borrado"
            ]);
    }
}
