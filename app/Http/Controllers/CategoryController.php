<?php

namespace Scpm\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Scpm\Http\Requests;
use Scpm\Http\Requests\CategoryCreateRequest;
use Scpm\Category;
use Scpm\Group;
use Session;
use Redirect;
use Datatables;

class CategoryController extends Controller
{public function __construct(){
         $this->beforeFilter('@find',['only' => ['edit','update','destroy']]);
    }

    public function find(Route $route){
        $this->category = Category::find($route->getParameter('category'));
        $this->notFound($this->category);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('category.index');
    }

    public function getCategoria(){
 
        $categories = Category::select(['idCategoria', 'nombreCategoria']);
        return Datatables::of($categories)->addColumn('action', function($category) {
                    return 
                    '<a href="#edit/'.$category->idCategoria.'" title="Editar" class="btn btn-primary btn-xs"
                    onclick="Mostrar('.$category->idCategoria.')" 
                    class="" data-target="#myModal" data-toggle="modal">
                    <i class="glyphicon glyphicon-edit">
                    </i></a>

                    <button value="'.$category->idCategoria.'" href="" title="Eliminar"
                    onclick="Eliminar(this)" 
                    class="btn btn-danger btn-xs">
                    <i class="glyphicon glyphicon-trash">
                    </i></button>';
                })->make(true);
        
        }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.form_create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->ajax()){
            Category::create($request->all());
            return response()->json([
                "mensaje" => "creado"
            ]);
        }
            /*ESTE CODIGO ES PAA EL XEDITABLE*/
            /*$suma = count($request->name);  

            if($request->ajax()){
                for ($i=0; $i < $suma; $i++) { 
                    $nombreCategoria = $request->name[$i];
                    Category::create([
                        'nombreCategoria'=>$nombreCategoria,
                        ]);  
            }    
               return response()->json([
                    "mensaje" => "productos registrados"
                ]);
        }*/
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
        $category = Category::find($id);
        return response()->json(
                $category->toArray()
            );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryCreateRequest $request, $id)
    {
        $category = Category::find($id);
        $category->fill($request->all());
        $category->save();

        return response()->json([
                "mensaje"=>"listo"
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
        $this->category->delete();

        return response()->json([
                "mensaje"=>"borrado"
            ]);
    }
}
