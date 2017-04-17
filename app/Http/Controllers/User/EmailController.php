<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;

use Mail;
use Auth;
use App\User;
use Session;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class EmailController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function email() {

        $id = Auth::user()->id;
         $user = User::findOrFail($id);

       $mail = Mail::send('email.email', ['user' => $user], function($massage) use ($user) {
            $massage->to($user->email, $user->firstname)->subject('Welcome to abmeasy.com');
        });

       if($mail) {
            return redirect()->back()
                ->with('massage', 'Successfully send');
       } else {
            return redirect()->back()
                ->with('massage', 'Something Wrong. Please try again');
       }
    }
}
