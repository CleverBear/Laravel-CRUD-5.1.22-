<?php

namespace App\Http\Controllers\Signature;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Signature;
use App\User;


class SignatureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getSignature($token)
    {
    	$signature = Signature::where('token', $token)->first();
    	if(count($signature) > 0)
    	{
    		return view('signature.addsignature', compact('signature','token'));
    	}   
    	else 
    	{
    		return "Incorrect Token";
    	} 
    }

    /**
     * Store Signature
     *
     * @return \Illuminate\Http\Response
     */
    public function postSignature(Request $request,$token)
    {
    	$addsignature = Signature::where('token', $token)->first();
    	$addsignature->signature = $request->input('signature');
    	$addsignature->save();

    	$user = User::where('id', $addsignature->user_id)->first();

        if($addsignature && $user)
        {
        	$this->adminSignatureLink($token, $user);
        	$this->userSignatureLink($token, $user);

         return redirect()->back()
                ->with('massage', 'Your signature add successfully.');
        } else {
            return redirect()->back()
                ->with('massage', 'Something wrong. Please try again.')
                ->withInput();
        }
    }


    public function viewSignature($token) 
    {
    	$viewsignature = Signature::where('token', $token)->first();

    	return view('signature.viewsignature', compact('viewsignature'));
    }

 	public function adminSignatureLink($token, $user) 
    {
        \Mail::send('email.adminsignaturelink', ['token' => $token, 'user' => $user], function ($message) use ($token, $user) {
            $message->to($user->email, $user->firstname)->subject('New signature add');
        });
    }

 	public function userSignatureLink($token, $user) 
    {
        \Mail::send('email.usersignaturelink', ['token' => $token, 'user' => $user], function ($message) use ($token, $user) {
            $message->to($user->email, $user->firstname)->subject('Signature add successfully');
        });
    }
}
