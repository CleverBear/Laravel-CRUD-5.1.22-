<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class EditTaxServiceRequest extends Request
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
            'firstname'                     => 'required|alpha|min:2|max:255',
            'lastname'                      => 'required|alpha|min:2|max:255',
            'socialinsurancenumber'         => 'required|integer|digits:9|unique:tax_services,socialinsurancenumber,'.$this->id,
            'country'                       => 'required',
            'maritalstatus'                 => 'required',
            'typeoftaxreturn'               => 'required',
            'address'                       => 'required',
            'city'                          => 'required',
            'provinceorstate'               => 'required',

            'spousefirstname'               => 'required_if:spouse,yes|alpha|min:2|max:255',
            'spouselastname'                => 'required_if:spouse,yes|alpha|min:2|max:255',
            'spousesocialinsurancenumber'   => 'required_if:spouse,yes|integer|digits:9|unique:spouses,spousesocialinsurancenumber,'.$this->id.',tax_service_id',

            'dependentfirstname'            => 'required_if:dependent,yes|min:1|max:255',
            'dependentlastname'             => 'required_if:dependent,yes|min:1|max:255',
            'dependentdateofbirth'          => 'required_if:dependent,yes|min:1',
            'relationship'                  => 'required_if:dependent,yes|min:1',
            'comment'                       => 'required_if:dependent,yes|min:1',
            'dependentgender'               => 'required_if:dependent,yes|min:1',

            'revenueagency'                      => 'required|boolean',
        ];
    }

    public function forbiddenResponse() 
    {
        return redirect()->back();
    }
}
