<?php

namespace Scpm\Http\Requests;

use Scpm\Http\Requests\Request;

class ShiftCreateRequest extends Request
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
            'fechaInicio' => 'required',
            'fechaFin' => 'required',
            'horaInicio' => 'required',
            'horaFin' => 'required',
        ];
    }
}
