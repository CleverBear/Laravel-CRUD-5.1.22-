<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class EditUploadRequest extends Request
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
            'docname'           => 'required|alpha_num_spaces|min:2|max:255',
        ];
    }

    public function forbiddenResponse() 
    {
        return redirect()->back();
    }
}
