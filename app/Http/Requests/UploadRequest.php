<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UploadRequest extends Request
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
            'applicationnumber' => 'required',
            'date'              => 'required',
            'doccategory'       => 'required',
            'doctype'           => 'required',
            'docname'           => 'required|alpha|min:2|max:255',
            'docfile'           => 'required|max:51200',
        ];
    }

    public function forbiddenResponse() 
    {
        return redirect()->back();
    }
}
