<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Validator;

class CreateRepositoryRequest extends Request
{
//    function __construct()
//    {
//    }

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
            'name' => 'required',
            'url' => 'required|urlvalid'
//            'url' => 'required|active_url'
        ];
    }

}
