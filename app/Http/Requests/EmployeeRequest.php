<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class EmployeeRequest extends Request
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
            'email'         => 'required|email|max:255|unique:employees',
            'firstname'     => 'required|alpha|min:2|max:255',
            'lastname'      => 'required|alpha|min:2|max:255',            
            'level'         => 'required',
        ];
    }


    public function forbiddenResponse() 
    {
        return redirect()->back();
    }
}
