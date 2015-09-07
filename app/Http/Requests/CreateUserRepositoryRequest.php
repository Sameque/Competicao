<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateUserRepositoryRequest extends Request
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
//            'id' =>'required',
//            'repository_id' =>'required',
//            'username' =>'required',
//            'user_id' =>'required',
//            'created_at' =>'required',
//            'updated_at' =>'required',

        ];
    }
}
