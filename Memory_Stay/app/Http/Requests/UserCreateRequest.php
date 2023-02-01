<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Http\Exceptions\HttpResponseException;

use Illuminate\Contracts\Validation\Validator;



class UserCreateRequest extends FormRequest

{

    public function rules()

    {

        return [

            'name' => 'required',
            'email' => 'required|email:rfc,dns|unique:users,email',
            'password' => 'required'

        ];

    }



    public function failedValidation(Validator $validator)

    {

        throw new HttpResponseException(response()->json([

            'success'   => false,

            'message'   => 'Validation errors',

            'data'      => $validator->errors()

        ]));

    }


}