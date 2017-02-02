<?php

namespace Scpm\Http\Controllers;

use Illuminate\Http\Request;

use Scpm\Http\Requests;
use Scpm\Http\Requests\CreditCreateRequest;
use Scpm\Http\Controllers\Controller;
use Illuminate\Routing\Route;
use Scpm\Category;
use Scpm\Company;
use Scpm\Credit;
use Session;
use Redirect;
use Auth;
use PDF;
use Datatables;

class CreditController extends Controller
{

    public function __construct(){
         $this->beforeFilter('@find',['only' => ['edit','update','destroy']]);
    }

    public function find(Route $route){
        $this->credit = Credit::find($route->getParameter('credit'));
        $this->notFound($this->credit);
        
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::Lists('nombreCategoria','idCategoria');
        return view('service.index',compact('categories'));    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::Lists('nombreCategoria','idCategoria');
        return view('service.form_create', compact('categories'));
    }

    public function getCredits()
    {

        $cmp_id = Session::get('cmp_id');
        $credits = Credit::Join('categories','categories.idCategoria','=','credits.idCategoria')
                    ->where('credits.idEmpresa','=',$cmp_id)
                    ->select(array('credits.montoMinimo','credits.montoMaximo','credits.plazoMinimo','credits.plazoMaximo','credits.idCredito','credits.tasaInteres','categories.nombreCategoria','categories.idCategoria'));

        return Datatables::of($credits)->addColumn('action', function($credit) {
                    return 
                    '<a href="#edit/'.$credit->idCredito.'" title="Editar" class="btn btn-primary btn-xs"
                    onclick="Mostrar('.$credit->idCredito.')" 
                    class="" data-target="#myModal" data-toggle="modal">
                    <i class="glyphicon glyphicon-edit">
                    </i></a>

                    <button value="'.$credit->idCredito.'" href="" title="Eliminar"
                    onclick="Eliminar(this)" 
                    class="btn btn-danger btn-xs">
                    <i class="glyphicon glyphicon-trash">
                    </i></button>';
                })
                ->make(true);        

        }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreditCreateRequest $request)
    {

        $cmp_id = Session::get('cmp_id');

       Credit::create([
            'montoMinimo'=>$request['montoMinimo'],
            'montoMaximo'=>$request['montoMaximo'],
            'plazoMinimo'=>$request['plazoMinimo'],
            'plazoMaximo'=>$request['plazoMaximo'],
            'tasaInteres'=>$request['tasaInteres'],
            'idCategoria'=>$request['idCategoria'],
            'idEmpresa'=> $cmp_id,
            ]);

        Session::flash('message','Datos Registrados correctamente');
        return redirect::to('/credit');
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
        $credit = Credit::find($id);
        return response()->json(
                $credit->toArray()
            );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreditCreateRequest $request, $id)
    {       
        $credit = Credit::find($id);
        $credit->fill($request->all());
        $credit->save();

        return response()->json([
                "mensaje"=>"credito actualizado"
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
        $this->credit->delete();
         return response()->json([
                "mensaje"=>"crédito borrado"
            ]);
    }

    public function getReporteCreditos($tipo)
    {
        $cmp_id = Session::get('cmp_id');
        $perfil = Company::getPerfil($cmp_id);
        $credits = Credit::getCredits($cmp_id);

        $date = date('Y-m-d');
        $view =  \View::make('pdf.reporte_creditos', compact('credits', 'perfil', 'date'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);

        if($tipo==1){
        return $pdf->stream('Creditos');
        }
        if($tipo==2){
        return $pdf->download('Creditos.pdf');
        }
    }
}
