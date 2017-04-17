<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class SignupRequest extends Request
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
            'firstname'     => 'required|alpha|min:2|max:255',
            'lastname'      => 'required|alpha|min:2|max:255',
            'email'         => 'required|email|max:255|unique:users',
            'password'      => 'required|confirmed|min:6|max:255',
            'telephone'     => 'required|integer|min:8',
        ];
    }


    public function forbiddenResponse() 
    {
        return redirect()->back();
    }
}
