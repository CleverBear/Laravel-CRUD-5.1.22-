<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ApplicationTax extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['tax_service_id','typeoftaxreturn', 'price', 'discount'];
}
