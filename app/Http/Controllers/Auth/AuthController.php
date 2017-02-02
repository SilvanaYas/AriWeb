<?php

namespace Scpm\Http\Controllers\Auth;

use Scpm\User;
use Validator;
use Illuminate\Http\Request;
use Scpm\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Session;
use Redirect;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
   public function confirmRegister($email, $confirm_token){
        $user = new User;
        $the_user = $user->select()->where('email','=',$email)
        ->where('confirm_token','=',$confirm_token)->get();

        if(count($the_user)>0){
            $active = 1;
            $confirm_token = str_random(100);
            $user->where('email','=',$email)
            ->update(['activo'=>$active, 'confirm_token'=>$confirm_token]);

                Session::flash('message','En hora buena'.$the_user[0]['nombreUsuario'].' ya puedes iniciar sesión');
                return Redirect::to('/log');

        }else{

            Session::flash('message','Su cuenta ya ha sido habilitada anteriormente');
            return Redirect::to('/log'); 
         }

    }
}
