<?php

namespace Scpm\Http\Controllers;

use Illuminate\Http\Request;

use Scpm\Http\Requests;
use Scpm\Http\Controllers\Controller;
use Scpm\Http\Requests\UserUpdateRequest;
use Illuminate\Routing\Route;
use Scpm\User;
use Scpm\Company;
use Session;
use Redirect;
use Auth;

class ProfileController extends Controller
{

    public function __construct(){
         $this->beforeFilter('@find',['only' => ['edit','update','destroy']]);
    }

    public function find(Route $route){
        $this->profile = User::find($route->getParameter('profile'));
        $this->notFound($this->profile);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Session::get('usuario');
        $datos = User::getUserData($user_id);
        $cmp_id = Auth::user()->idEmpresa;

        if ($cmp_id != NULL) {
            $id_gru = Company::getIdGrupo($cmp_id);
            Session::put('gro_id', $id_gru[0]->idGrupo);
            $id_grupo = Session::get('gro_id');

            if($id_grupo ==1)
            {
                return view('profile.profile_gasolinera', compact('datos'));
            }
            if($id_grupo ==2)
            {
                return view('profile.profile_farmacia', compact('datos'));
            }
            if($id_grupo ==3)
            {
                return view('profile.profile_banco', compact('datos'));
            }
        }else{
                return view('profile.index', compact('datos'));
        }     
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $profile = User::find($id);
        return response()->json(
                $profile->toArray()
            );
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
        $profile = User::find($id);
        $profile->fill($request->all());
        $profile->save();

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
        //
    }
}
