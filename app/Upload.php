<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Upload extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id','tax_service_id', 'date', 'doccategory', 'doctype', 'docname', 'docfileextension'];
}
