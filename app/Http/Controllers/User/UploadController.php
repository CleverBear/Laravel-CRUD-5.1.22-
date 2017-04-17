<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Auth;
use App\User;
use App\Upload;
use App\Http\Requests\UploadRequest;
use App\Http\Requests\EditUploadRequest;
use File;

class UploadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $applicationID = User::find(Auth::user()->id)->taxservice()->select('id')->orderBy('id', 'desc')->get();
        
        $uploadfiles = Upload::where('user_id', Auth::user()->id)->orderBy('tax_service_id', 'desc')->orderBy('id', 'desc')->get();

        return view('dashboard.upload', compact('applicationID', 'uploadfiles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UploadRequest $request)
    {
        $samefile = Upload::where('user_id', Auth::user()->id)->where('tax_service_id', $request->input('applicationnumber'))->where('doccategory',$request->input('doccategory'))->where('doctype',$request->input('doctype'))->first();
        if(count($samefile) > 0)
        {
            return redirect()->back()
                ->with('massage', 'Already have this file')
                ->withInput();
        }
        else {

            $fileextension = $request->input('applicationnumber').'.'.$request->file('docfile')->getClientOriginalExtension();

            $path          = '/public/file/'.$request->input('doccategory').'/'.$request->input('doctype').'/';

            $file = $request->file('docfile')->move(
                base_path() . $path,
                $fileextension
            );

            $upload = Upload::create([
                'user_id'           => Auth::user()->id,
                'tax_service_id'    => $request->input('applicationnumber'),
                'date'              => $request->input('date'),
                'doccategory'       => $request->input('doccategory'),
                'doctype'           => $request->input('doctype'),
                'docname'           => $request->input('docname'),
                'docfileextension'  => $request->file('docfile')->getClientOriginalExtension()
            ]);

            if($file && $upload) {
                return redirect()->action('User\UploadController@index')
                    ->with('massage', 'Your data save successfully');
            } 
            else {
                return redirect()->action('User\UploadController@index')
                    ->with('massage', 'Something wrong. Please try again.')
                    ->withInput();
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $uploaddata = Upload::find($id);
        if(count($uploaddata) >0 ) {
            $applicationID = User::find(Auth::user()->id)->taxservice()->select('id')->orderBy('id', 'desc')->get();
            $uploadfiles = Upload::where('user_id', Auth::user()->id)->orderBy('tax_service_id', 'desc')->orderBy('id', 'desc')->get();

            return view('dashboard.editupload', compact('applicationID','uploadfiles','uploaddata'));
        } 
        else  {
            return redirect()->action('User\UploadController@index');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditUploadRequest $request, $id)
    {

        $updatefile = Upload::find($id);
        
        if(count($updatefile) > 0) {
            $updatefile->docname            = $request->input('docname');
            $updatefile->save();

            if($updatefile) {
                return redirect()->back()
                    ->with('massage', 'Successfully update');
            } 
            else {
                return redirect()->back()
                    ->with('massage', 'Something wrong. Please try again.')
                    ->withInput();
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
        $uploadfile = Upload::find($id);

        if(count($uploadfile) > 0) {
            $pathfile          = public_path().'/file/'.$uploadfile->doccategory.'/'.$uploadfile->doctype.'/'.$uploadfile->tax_service_id.'.'.$uploadfile->docfileextension;
            $deletefile = File::delete($pathfile);
            
            $deleteupload = Upload::destroy($id);

            if($deletefile && $deleteupload) {
                return redirect()->back()
                    ->with('massage', 'Successfully delete');
            } 
            else {
                return redirect()->back()
                    ->with('massage', 'Something wrong. Please try again.')
                    ->withInput();
            }
        }
        else  {
            return redirect()->action('User\UploadController@index');
        }
    }

    public function download($id)
    {
        $uploadfile = Upload::find($id);
        if(count($uploadfile) > 0) {
            $pathfile          = public_path().'/file/'.$uploadfile->doccategory.'/'.$uploadfile->doctype.'/'.$uploadfile->tax_service_id.'.'.$uploadfile->docfileextension;

            return response()->download($pathfile);
        }
    }
}
