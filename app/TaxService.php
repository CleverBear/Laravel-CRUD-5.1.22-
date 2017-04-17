<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TaxService extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'firstname', 'lastname', 'socialinsurancenumber', 'country', 'maritalstatus','address','city','provinceorstate', 'postalcode'];

    public function applicationtaxes()
    {
         return $this->hasOne('App\ApplicationTax', 'tax_service_id');
    }

    public function spouse()
    {
        return $this->hasMany('App\Spouse');
    }

    public function dependent()
    {
         return $this->hasMany('App\Dependent', 'tax_service_id');
    }

    public function uploadfile()
    {
         return $this->hasMany('App\Upload', 'tax_service_id');
    }

    public function user()
    {
         return $this->belongsTo('App\User');
    }
}
