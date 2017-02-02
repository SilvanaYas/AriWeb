<?php

namespace Scpm\Http\Controllers;

use Illuminate\Http\Request;
use Scpm\Http\Requests;
use Scpm\Http\Controllers\Controller;
use Scpm\Http\Requests\LoginRequest;
use Auth;
use Session;
use Redirect;

class LogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('login.index');
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
    public function store(LoginRequest $request)
    {
        if(Auth::attempt(['email'=>$request['email'], 'password'=>$request['password'],'activo'=>1])){
            if(Auth::user()->idRol==1){
                return Redirect::to('admin');
            }
            if(Auth::user()->idRol==2){
                return Redirect::to('company');
            }
            if(Auth::user()->idRol==3){
                return Redirect::to('branch');
            }
        }else
        {
        Session::flash('message-error','Correo o contraseña incorrecta');
        return redirect::to('/log');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {    
         Auth::logout();
         Session::flush();
          return Redirect::to('/');
    }
}
