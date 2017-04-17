<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\TaxService;
use App\Employee;
use App\Http\Requests\EmployeeRequest;
use App\Http\Requests\EditEmployeeRequest;

class AdminController extends Controller
{
    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');

        $this->middleware('employee');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function userindex()
    {
        $user = User::where('type', 0)->select('id','firstname','lastname','email','telephone')->orderBy('id', 'desc')->get();

        return view('admin.user', compact('user'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function applicationindex()
    {
        $tax = TaxService::orderBy('id', 'desc')->get();

        return view('admin.application', compact('tax'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function viewApplication($id)
    {
        $tax        = TaxService::orderBy('id', 'desc')->get();
        $taxservice = TaxService::find($id);

        return view('admin.viewapplication', compact('tax','taxservice'));
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function adminindex()
    {
        $employee = Employee::orderBy('id', 'desc')->get();

        return view('admin.admin', compact('employee'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createEmployee(EmployeeRequest $request)
    {
        // $password = str_random(10);
        $password   = '123456';

        $createEmployee = Employee::create([
            'firstname'     => ucfirst($request->firstname),
            'lastname'      => ucfirst($request->lastname),
            'email'         => $request->email,
            'level'         => $request->level
        ]);

        if($createEmployee) {
            
            $userTable = User::where('email',$request->email)->first();
            
            if(count($userTable) > 0) 
            {
                $userTable->type = $request->level;
                $userTable->save();
            }
            else {
                $createUser = User::create([
                    'firstname'     => ucfirst($request->firstname),
                    'lastname'      => ucfirst($request->lastname),
                    'email'         => $request->email,
                    'active'        => 0,
                    'type'          => $request->level,
                    'password'      => bcrypt($password)
                ]);
            }

            return redirect()->action('Admin\AdminController@adminindex')
                ->with('massage', 'Employee create successfully');
        }
        else {
            return redirect()->action('Admin\AdminController@adminindex')
                ->with('massage', 'Something wrong. Please try again.')
                ->withInput();
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteEmployee($id)
    {
        $employee = Employee::find($id);

        $user = User::where('email', $employee->email)->first();
        $user->type = 0;
        $user->save();

        $deleteemployee = Employee::destroy($id);

        if($deleteemployee) {
            return redirect()->action('Admin\AdminController@adminindex')
                ->with('massage', 'Successfully delete');
        } 
        else {
            return redirect()->action('Admin\AdminController@adminindex')
                ->with('massage', 'Something wrong. Please try again.');
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getEditEmployee($id)
    {
        $employees = Employee::orderBy('id', 'desc')->get();
        $employee  = Employee::find($id);
        return view('admin.editemployee', compact('employee','employees'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postEditEmployee(EditEmployeeRequest $request,$id)
    {
        $employee = Employee::find($id);
        $employee->firstname = $request->firstname;
        $employee->lastname  = $request->lastname;
        $employee->level     = $request->level;
        $employee->save();

        $user = User::where('email', $employee->email)->first();
        $user->type = $request->level;
        $user->save();

        if($employee && $user) {
            return redirect()->back()
                ->with('massage', 'Successfully edit');
        } 
        else {
            return redirect()->back()
                ->with('massage', 'Something wrong. Please try again.')
                ->withInput();
        }

    }


    public function search(Request $request)
    {
        $tax = TaxService::orderBy('id', 'desc')->get();

        $search = TaxService::where('id', 'LIKE', '%' . $request->search . '%')
                            ->orWhere('created_at', 'LIKE', '%' . $request->search . '%')
                            ->orWhere('firstname', 'LIKE', '%' . $request->search . '%')
                            ->orWhere('lastname', 'LIKE', '%' . $request->search . '%')
                            ->orWhere('socialinsurancenumber', 'LIKE', '%' . $request->search . '%')
                            ->orWhere('country', 'LIKE', '%' . $request->search . '%')
                            ->orWhere('maritalstatus', 'LIKE', '%' . $request->search . '%')
                            ->orWhere('city', 'LIKE', '%' . $request->search . '%')
                            ->orWhere('provinceorstate', 'LIKE', '%' . $request->search . '%')
                            ->paginate(10);

        return view('admin.application', compact('search','tax'));
    }

    public function usersearch(Request $request)
    {
        $user = User::where('type', 0)->select('id','firstname','lastname','email','telephone')->orderBy('id', 'desc')->get();
        
        $search = User::where('id', 'LIKE', '%' . $request->search . '%')
                        ->orWhere('firstname', 'LIKE', '%' . $request->search . '%')
                        ->orWhere('lastname', 'LIKE', '%' . $request->search . '%')
                        ->orWhere('email', 'LIKE', '%' . $request->search . '%')
                        ->orWhere('telephone', 'LIKE', '%' . $request->search . '%')
                        ->paginate(10);

        return view('admin.user', compact('search','user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
}
