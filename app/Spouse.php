<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Spouse extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['tax_service_id','spousefirstname', 'spouselastname', 'spousesocialinsurancenumber'];
}
