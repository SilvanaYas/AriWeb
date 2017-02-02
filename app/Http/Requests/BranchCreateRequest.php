<?php

namespace Scpm\Http\Requests;
use Scpm\Http\Requests\Request;

class BranchCreateRequest extends Request
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
            'nombreSucursal' => 'required|String',
            'direccion' => 'required|String',
            'latitud'=>'required|numeric',
            'longitud' => 'required|numeric',
            'telefono' => 'required',
            'idProvincia' => 'required',
            'idCanton' => 'required',
            'idParroquia' => 'required',

        ];
    }
}
