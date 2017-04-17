<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class EditEmployeeRequest extends Request
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
            'level'         => 'required',
        ];
    }


    public function forbiddenResponse() 
    {
        return redirect()->back();
    }
}
