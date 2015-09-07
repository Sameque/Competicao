<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class EditUserRequest extends Request
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
//            'id' =>'required|unique:user,id',
            'name' =>'required',
//            'accessLevel' => 'required',
            'password' => 'required',
            'username' => 'required',
            'email' => 'required',
//            'cpf' => 'required',
//            'rg' => 'required',
//            'yearCourse' => 'required',
//            'birthDate' => 'required',
//            'graduated' => 'required'
        ];
    }
}
