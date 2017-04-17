<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Auth;
use App\Http\Requests\TaxServiceRequest;
use App\Http\Requests\EditTaxServiceRequest;
use App\TaxService;
use App\ApplicationTax;
use App\Spouse;
use App\Dependent;
use App\RevenueAgency;
use App\Upload;
use File;

class TaxServiceController extends Controller
{
    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the form for Tax Service.
     *
     * @return \Illuminate\Http\Response
     */
    public function getTaxservice()
    {
        return view('dashboard.taxservice');
    }

    /**
     * Store a newly created Tax Service.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postTaxservice(TaxServiceRequest $request)
    {
        $taxservice = TaxService::create([
            'user_id'               => Auth::user()->id,
            'firstname'             => $request->input('firstname'),
            'lastname'              => $request->input('lastname'),
            'socialinsurancenumber' => $request->input('socialinsurancenumber'),
            'country'               => $request->input('country'),
            'maritalstatus'         => $request->input('maritalstatus'),
            'address'               => $request->input('address'),
            'city'                  => $request->input('city'),
            'provinceorstate'       => $request->input('provinceorstate'),
            'postalcode'            => $request->input('postalcode')
        ]);

        $applicationtax = ApplicationTax::create([
            'tax_service_id'        => $taxservice->id,
            'typeoftaxreturn'       => $request->input('typeoftaxreturn'),
            'discount'              => 0
        ]);

        $cragency = RevenueAgency::create([
            'tax_service_id'        => $taxservice->id,
            'revenueagency'         => $request->input('revenueagency')
        ]);

        if($request->input('spouse') == 'yes')
        {
            $spouse = Spouse::create([
                'tax_service_id'                => $taxservice->id,            
                'spousefirstname'               => $request->input('spousefirstname'),
                'spouselastname'                => $request->input('spouselastname'),
                'spousesocialinsurancenumber'   => $request->input('spousesocialinsurancenumber') 
            ]);                       
        }

        if($request->input('dependent') == 'yes') 
        {
            $d = count($request->input('dependentfirstname'));

            $dependentfirstname     = $request->input('dependentfirstname');
            $dependentlastname      = $request->input('dependentlastname');
            $dependentdateofbirth   = $request->input('dependentdateofbirth');
            $relationship           = $request->input('relationship');
            $comment                = $request->input('comment');
            $dependentgender        = $request->input('dependentgender');

            for($i = 0; $i < $d; ++$i ) {
                if($dependentfirstname[$i] && $dependentlastname[$i] && $dependentdateofbirth[$i] && $relationship[$i] && $comment[$i] && $dependentgender[$i])
                {
                    $dependent                          = new Dependent;
                    $dependent->tax_service_id          = $taxservice->id;
                    $dependent->dependentfirstname      = $dependentfirstname[$i];
                    $dependent->dependentlastname       = $dependentlastname[$i];
                    $dependent->dependentdateofbirth    = $dependentdateofbirth[$i];
                    $dependent->relationship            = $relationship[$i];
                    $dependent->comment                 = $comment[$i];
                    $dependent->dependentgender         = $dependentgender[$i];
                    $dependent->save();
                }
            }
        }

        if($taxservice && $applicationtax && $cragency) {

            $this->adminSendmail($taxservice,$applicationtax);
            $this->userSendmail($taxservice,$applicationtax);

            if($request->input('saveandupload') === 'Saving')
            {
                return redirect()->action('User\UploadController@index')
                    ->with('massage', 'Your data save successfully');
            }
            else {
                return redirect()->back()
                    ->with('massage', 'Your data save successfully');
            }
        } 
        else {
            return redirect()->back()
                ->with('massage', 'Something wrong. Please try again.')
                ->withInput();
        }
    }

    /**
     * Show the form for Tax Progress.
     *
     * @return \Illuminate\Http\Response
     */
    public function getProgress()
    {
        $taxprogresdata = TaxService::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->get();
        return view('dashboard.taxprogress', compact('taxprogresdata'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $taxprogress = TaxService::where('user_id', Auth::user()->id)->where('id',$id)->first();

        return view('dashboard.edittaxprogress', compact('taxprogress'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditTaxServiceRequest $request, $id)
    {
        $taxservice = TaxService::find($id);
        $taxservice->firstname             = $request->input('firstname');
        $taxservice->lastname              = $request->input('lastname');
        $taxservice->socialinsurancenumber = $request->input('socialinsurancenumber');
        $taxservice->country               = $request->input('country');
        $taxservice->maritalstatus         = $request->input('maritalstatus');
        $taxservice->address               = $request->input('address');
        $taxservice->city                  = $request->input('city');
        $taxservice->provinceorstate       = $request->input('provinceorstate');
        $taxservice->postalcode            = $request->input('postalcode');
        $taxservice->save();

        $applicationtax = ApplicationTax::where('tax_service_id', $id)->first();
        $applicationtax->typeoftaxreturn       = $request->input('typeoftaxreturn');
        $applicationtax->save();

        $cragency = RevenueAgency::where('tax_service_id', $id)->first();
        $cragency->revenueagency         = $request->input('revenueagency');
        $cragency->save();


        if($request->input('spouse') == 'yes')
        {
            $spouse = Spouse::where('tax_service_id', $id)->first(); 
            if(count($spouse) > 0) {         
                $spouse->spousefirstname               = $request->input('spousefirstname');
                $spouse->spouselastname                = $request->input('spouselastname');
                $spouse->spousesocialinsurancenumber   = $request->input('spousesocialinsurancenumber');  
                $spouse->save();     
            }  
            else {
                $spouse = Spouse::create([
                    'tax_service_id'                => $id,            
                    'spousefirstname'               => $request->input('spousefirstname'),
                    'spouselastname'                => $request->input('spouselastname'),
                    'spousesocialinsurancenumber'   => $request->input('spousesocialinsurancenumber') 
                ]); 
            }              
        }
        else {
            $spouse = Spouse::where('tax_service_id', $id)->first();  
            if(count($spouse) > 0) {
                $spouse->delete();
            }
        }

        if($request->input('dependent') == 'yes') 
        {
            $d = count($request->input('dependentfirstname'));

            $dependentfirstname     = $request->input('dependentfirstname');
            $dependentlastname      = $request->input('dependentlastname');
            $dependentdateofbirth   = $request->input('dependentdateofbirth');
            $relationship           = $request->input('relationship');
            $comment                = $request->input('comment');
            $dependentgender        = $request->input('dependentgender');

            $dependents  = Dependent::where('tax_service_id', $id)->get();

            if(count($dependents) > 0) {
                foreach($dependents as $dp) {
                    $deletedependent = Dependent::destroy($dp->id);
                }                

                for($i = 0; $i < $d; ++$i ) {
                    if($dependentfirstname[$i] && $dependentlastname[$i] && $dependentdateofbirth[$i] && $relationship[$i] && $comment[$i] && $dependentgender[$i])
                    {
                        $dependent                          = new Dependent;
                        $dependent->tax_service_id          = $taxservice->id;
                        $dependent->dependentfirstname      = $dependentfirstname[$i];
                        $dependent->dependentlastname       = $dependentlastname[$i];
                        $dependent->dependentdateofbirth    = $dependentdateofbirth[$i];
                        $dependent->relationship            = $relationship[$i];
                        $dependent->comment                 = $comment[$i];
                        $dependent->dependentgender         = $dependentgender[$i];
                        $dependent->save();
                    }
                }
            }
            else {
                for($i = 0; $i < $d; ++$i ) {
                    if($dependentfirstname[$i] && $dependentlastname[$i] && $dependentdateofbirth[$i] && $relationship[$i] && $comment[$i] && $dependentgender[$i])
                    {
                        $dependent                          = new Dependent;
                        $dependent->tax_service_id          = $taxservice->id;
                        $dependent->dependentfirstname      = $dependentfirstname[$i];
                        $dependent->dependentlastname       = $dependentlastname[$i];
                        $dependent->dependentdateofbirth    = $dependentdateofbirth[$i];
                        $dependent->relationship            = $relationship[$i];
                        $dependent->comment                 = $comment[$i];
                        $dependent->dependentgender         = $dependentgender[$i];
                        $dependent->save();
                    }
                }
            }            
        }
        else {
            $dependents  = Dependent::where('tax_service_id', $id)->get();
            if(count($dependents) > 0) {
                foreach($dependents as $d) {
                    $deletedependent = Dependent::destroy($d->id);
                }
            } 
        }

        if($taxservice && $applicationtax && $cragency) {

            if($request->input('saveandupload') === 'Updating')
            {
                return redirect()->action('User\UploadController@index')
                    ->with('massage', 'Your data update successfully');
            }
            else {
                return redirect()->back()
                    ->with('massage', 'Your data update successfully');
            }
        } 
        else {
            return redirect()->back()
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
    public function destroy($id)
    {
        $taxservicedata = TaxService::where('user_id', Auth::user()->id)->where('id', $id)->get();

        if(count($taxservicedata) > 0) {
            $deletetaxservice = TaxService::destroy($id);
            $deletespouse     = Spouse::where('tax_service_id', $id)->delete();
            $deleterevenueagency = RevenueAgency::where('tax_service_id', $id)->delete();
            $deletedependent        = Dependent::where('tax_service_id', $id)->delete();
            $deleteapplicationtax   = ApplicationTax::where('tax_service_id', $id)->delete();

            $uploadfile = Upload::where('user_id', Auth::user()->id)->where('tax_service_id', $id)->get();
            if(count($uploadfile) > 0) {
                foreach($uploadfile as $uf) {
                    $pathfile          = public_path().'/file/'.$uf->doccategory.'/'.$uf->doctype.'/'.$uf->tax_service_id.'.'.$uf->docfileextension;
                    $deletefile = File::delete($pathfile);
                
                    $deleteupload = Upload::destroy($uf->id);
                }
            }
            if($deletetaxservice  && $deleterevenueagency  && $deleteapplicationtax) {
                return redirect()->back()
                    ->with('massage', 'Successfully delete');
            } 
            else {
                return redirect()->back()
                    ->with('massage', 'Something wrong. Please try again.');
            }

        }
        else {
            return redirect()->action('User\TaxServiceController@getProgress');
        }
    }





    /**
     * Send mail to Admin
     *
     * @return \Illuminate\Http\Response
     */
    public function adminSendmail($taxservice,$applicationtax)
    {
        \Mail::send('email.adminsendmail', ['taxservice' => $taxservice, 'applicationtax' => $applicationtax], function ($message) use ($taxservice,$applicationtax) {
            $message->to('stars8422@gmail.com', 'Admin')->subject('Admin Tax Service');
        });
    }


    /**
     * Send mail to User
     *
     * @return \Illuminate\Http\Response
     */
    public function userSendmail($taxservice,$applicationtax)
    {
        \Mail::send('email.usersendmail', ['taxservice' => $taxservice, 'applicationtax' => $applicationtax], function ($message) use ($taxservice,$applicationtax) {
            $message->to(Auth::user()->email, Auth::user()->firstname)->subject('User Tax Service');
        });
    }
}
