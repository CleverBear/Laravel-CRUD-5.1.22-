<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Auth;
use Session;
use App\User;
use App\Signature;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\SignupRequest;

class AuthController extends Controller
{
    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
    }

    /**
     * Show the form for SignUp User.
     *
     * @return \Illuminate\Http\Response
     */
    public function getSignup()
    {
        return view('auth.signup');
    }

    /**
     * Store a newly created SignUp User.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postSignup(SignupRequest $request)
    {
        $createUser = User::create([
            'firstname'     => ucfirst($request->firstname),
            'lastname'      => ucfirst($request->lastname),
            'email'         => $request->email,
            'telephone'     => $request->telephone,
            'active'        => 0,
            'type'          => 0,
            'password'      => bcrypt($request->password)
        ]);

        $signature = Signature::create([
            'user_id'       => $createUser->id,
            'token'         => str_random(30).str_random(30)
        ]);

        if($createUser && $signature) {
            $this->sendmail($createUser);
            $this->sendSignatureLink($createUser , $signature);
            $remember = true;

            if (Auth::attempt([
                'email'     => $request->email, 
                'password'  => $request->password, 
                'active'    => 0,
                'type'      => 0
                ], $remember))  
            {                
                return redirect()->action('User\DashboardController@showDashboard');
            } 
            else {
                return redirect()->back()
                    ->with('massage', 'Something wrong. Please try again.')
                    ->withInput();
            }
        }
        else {
            return redirect()->back()->withInput();
        }
    }

    /**
     * Show the form for Login User,Admin and Employee.
     *
     * @return \Illuminate\Http\Response
     */
    public function getLogin()
    {
        return view('auth.login');
    }

    /**
     * Display the specified resource of Login.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postLogin(LoginRequest $request)
    {
        $remember = false;
        if ($request->has('remember')) {
            $remember = true;
        }

        if (Auth::attempt([
            'email'     => $request->email, 
            'password'  => $request->password
            ], $remember))  
        {            
            return redirect()->action('User\DashboardController@showDashboard');
        } 
        else {
            return redirect()->back()
                ->with('massage', 'Invalid email address or password. Please try again.')
                ->withInput();
        }
    }

    /**
     * Logout User,Admin and Employee.
     *
     * @return \Illuminate\Http\Response
     */
    public function getLogout()
    {
        Auth::logout();
        Session::flush();
        return redirect()->back();
    }

    /**
     *  Show the form for Forgot password of User,Admin and Employee.
     *
     * @return \Illuminate\Http\Response
     */
    public function getforgotPassword()
    {
        return view('auth.password');
    }

    /**
     * Specified resource for Forgot password of User,Admin and Employee.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postforgotPassword(Request $request)
    {
        return 'postforgotPassword';    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Send mail to User
     *
     * @return \Illuminate\Http\Response
     */
    public function sendmail($createUser)
    {
        \Mail::send('email.welcome-message', ['createUser' => $createUser], function ($message) use ($createUser) {
            $message->to($createUser->email, $createUser->firstname)->subject('Welcome to Abmeasy.com');
        });
    }

    public function sendSignatureLink($createUser, $signature) 
    {
        \Mail::send('email.signature', ['createUser' => $createUser, 'signature' => $signature], function ($message) use ($createUser, $signature) {
            $message->to($createUser->email, $createUser->firstname)->subject('Add Signature');
        });
    }
}
