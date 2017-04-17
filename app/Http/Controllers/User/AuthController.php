<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;

use Mail;
use Auth;
use App\User;
use App\Http\Requests;
use App\Http\Requests\LogInRequest;
use App\Http\Requests\SignUpRequest;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{

     /**
     * Instantiate a new UserController instance.
     *
     * @return void
     */
     public function __construct()
     {
     	$this->middleware('guest');
     }

     public function getSignup() 
     {
     	return view('auth.signup');
     }

     public function postSignup(SignUpRequest $Request)
     {
     	$userCreate = User::create([
     		'firstname' => ucfirst($Request->firstname),
               'lastname' => ucfirst($Request->lastname),
     		'email' => $Request->email,
               'telephone' => $Request->telephone,
               'active' => 0,
               'type' => 1,
     		'password' => bcrypt($Request->password)
     		]);

     	if($userCreate)
     	{
               $remember = true;

     		if (Auth::attempt([
     			'email' => $Request->email, 
     			'password' => $Request->password, 
                    'active' => 0,
                    'type' => 1
     			], $remember)) 
     		{
     			return redirect()->action('User\DashboardController@getShowDashboard');
     		} 
     		else 
     		{
     			return redirect()->back()
                    ->with('massage', 'Something wrong. Please try again.')
                    ->withInput();
     		}
     	}
     	else
     	{
     		return redirect()->back()->withInput();
     	}
     }

     public function getLogin()
     {
     	return view('auth.login');
     }

     public function postLogin(LogInRequest $Request)
     {
          $remember = true;

     	if(Auth::attempt([
               'email' => $Request->email,
               'password' => $Request->password,
               'active' => 0,
               'type' => 1
               ], $remember)) 
     	{
     		return redirect()->action('User\DashboardController@getShowDashboard');
     	}
          elseif(Auth::attempt([
               'email' => $Request->email,
               'password' => $Request->password,
               'active' => 1,
               'type' => 1
               ], $remember)) 
          {
               return redirect()->action('User\DashboardController@basicUserDashboard');
          }
          elseif(Auth::attempt([
               'email' => $Request->email,
               'password' => $Request->password,
               'active' => 1,
               'type' => 2
               ], $remember)) 
          {
               return redirect()->action('User\DashboardController@employeeDashboard');
          }
          elseif(Auth::attempt([
               'email' => $Request->email,
               'password' => $Request->password,
               'active' => 1,
               'type' => 3
               ], $remember)) 
          {
               return redirect()->action('User\DashboardController@adminDashboard');
          }
     	else 
     	{
     		return redirect()->back()
     		->with('massage', 'The email or password you entered is incorrect. Please try again.')
     		->withInput();
     	}
     }
 }