<?php

namespace Scpm\Http\Requests;

use Scpm\Http\Requests\Request;

class UserCreateRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|max:20|alpha_num',
            'nombreUsuario'=>'required|String',
            'apellidoUsuario' => 'required|String|different:nombreUsuario',
            'telefonoUsuario' => 'required',
            'password_confirmation'=> 'required|same:password',
        ];
    }
}
