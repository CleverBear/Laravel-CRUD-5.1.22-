<?php namespace App\Http\Requests;
 
use Illuminate\Validation\Validator;
 
class CustomValidation extends Validator {
     
    public function validateAlphaSpaces($attribute, $value, $parameters) {
 
        return preg_match('/^[\pL\s]+$/u', $value);
 
    }

    public function validateAlphaNumSpaces($attribute, $value, $parameters) {
        return preg_match( "/^[A-Za-z0-9\s]+$/", $value );
    }
 
}