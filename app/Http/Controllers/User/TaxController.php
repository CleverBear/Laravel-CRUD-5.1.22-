<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;


use Auth;
use Session;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class TaxController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getViewTax()
    {
    	return view('tax.from');
    }

    public function postFrom()
    {

    }
}
