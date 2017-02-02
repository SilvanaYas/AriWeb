<?php

namespace Scpm\Http\Controllers;

use Illuminate\Http\Request;

use Scpm\Http\Requests;
use Scpm\Http\Controllers\Controller;
use Scpm\User;
use Scpm\Rol;
use Scpm\Category;
use Input;
use DB;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

class PdfController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
    {
        $data = User::all();
        //$pdf = PDF::loadView('pdf.index');
        //$pdf = PDF::loadView('pdf.index', $data);
        //return $pdf->stream();
        //return $pdf->download('pruebapdf.pdf');
        $date = date('Y-m-d');
        $view =  \View::make('pdf.lista_usuarios', compact('data', 'date'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream('lista de Operadores Económicos.pdf');

    }

      public function crearPDF($datos,$vistaurl,$tipo)
    
    {

        $data = $datos;
        $date = date('Y-m-d');
        $view =  \View::make($vistaurl, compact('data', 'date'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        
        if($tipo==1){return $pdf->stream('reporte');}
        if($tipo==2){return $pdf->download('reporte.pdf'); }
    }


    public function crear_reporte_porpais($tipo){

     $vistaurl="pdf.reporte_por_pais";
     $usuarios=User::all();
     
     return $this->crearPDF($usuarios, $vistaurl,$tipo);
     
    }


}

