@extends('layout.mainlayout')

@section('title', 'Abmeasy')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
               @if(Session::has('massage'))
                <div class="text-danger"> 
                    <p>{{ Session::get('massage') }}</p>
                </div>
                @endif
                @if (count($errors) > 0)
                <div class="text-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                {!! Form::open(array('action' => 'User\TaxController@postFrom')) !!}
                    {!! Form::label('Social Insurance Number', 'Social Insurance Number') !!}                    
                    {!! Form::number('sin', null, array('class' => 'form-control', 'placeholder' => 'Social Insurance Number')) !!}
                    {!! Form::label('Country', 'Country') !!}                    
                    {!! Form::text('country', null, array('class' => 'form-control', 'placeholder' => 'Country')) !!}
                    {!! Form::label('Marital Statas', 'Marital Statas') !!}                    
                    
                    <select class="form-control">
                        <option>Divorce</option>
                        <option>Living Common Law</option>
                        <option>Married</option>
                        <option>Separated</option>
                        <option>Single</option>
                        <option>Window</option>
                    </select>

                    {!! Form::label('Are You filing for your spouse?', 'Are You filing for your spouse?') !!}  

                    <div class="radio">
                      <label>
                        <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
                        Yes
                      </label>
                    </div>
                    <div class="radio">
                      <label>
                        <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                        No
                      </label>
                    </div>                
                    
                    {!! Form::label('First Name', 'First Name') !!}                    
                    {!! Form::text('firstname', null, array('class' => 'form-control', 'placeholder' => 'First Name')) !!}
                    {!! Form::label('Last Name', 'Last Name') !!}                    
                    {!! Form::text('lastname', null, array('class' => 'form-control', 'placeholder' => 'Last Name')) !!}
                    {!! Form::label('Social Insurance Number', 'Social Insurance Number') !!}                    
                    {!! Form::number('sin', null, array('class' => 'form-control', 'placeholder' => 'Social Insurance Number')) !!} 

                    {!! Form::label('Address', 'Address') !!}                    
                    {!! Form::text('address', null, array('class' => 'form-control', 'placeholder' => 'Address')) !!}
                    {!! Form::label('City', 'City') !!}                    
                    {!! Form::text('city', null, array('class' => 'form-control', 'placeholder' => 'City')) !!}
                    {!! Form::label('province\State', 'Province\State') !!}                    
                    {!! Form::text('provincestate', null, array('class' => 'form-control', 'placeholder' => 'Province\State')) !!}
                    {!! Form::label('Type of tax return', 'Type of tax return') !!}                    
                    {!! Form::text('totr', null, array('class' => 'form-control', 'placeholder' => 'Type of tax return')) !!}
                    {!! Form::label('Price', 'Price') !!}                    
                    {!! Form::number('price', null, array('class' => 'form-control', 'placeholder' => 'Price')) !!} 
                    {!! Form::label('Discount', 'Discount') !!}                    
                    {!! Form::number('discount', null, array('class' => 'form-control', 'placeholder' => 'Discount')) !!} 

                    {!! Form::label('Do you have dependents?', 'Do you have dependents?') !!}  

                    <div class="radio">
                      <label>
                        <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
                        Yes
                      </label>
                    </div>
                    <div class="radio">
                      <label>
                        <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                        No
                      </label>
                    </div> 

                    {!! Form::label('First Name', 'First Name') !!}  
                    {!! Form::text('firstname', null, array('class' => 'form-control', 'placeholder' => 'First Name')) !!}
                    {!! Form::label('Last Name', 'Last Name') !!}                    
                    {!! Form::text('lastname', null, array('class' => 'form-control', 'placeholder' => 'Last Name')) !!}
                    
                    {!! Form::label('Date of birth') !!}
                    {!! Form::date('dob', \Carbon\Carbon::now(), array('class' => 'form-control')) !!}
                    {!! Form::label('Relationship', 'Relationship') !!}  

                    <select class="form-control">
                        <option>Son</option>
                        <option>Daughter</option>
                        <option>Father</option>
                        <option>Mother</option>
                        <option>Grand parent</option>
                        <option>Son in low</option>
                        <option>Daughter in low</option>
                    </select>

                    {!! Form::label('Authorize ABMEASY to download your information from Canada Revenue Agency?', 'Authorize ABMEASY to download your information from Canada Revenue Agency?') !!}
                   
                    <div class="radio">
                      <label>
                        <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
                        Yes
                      </label>
                    </div>
                    <div class="radio">
                      <label>
                        <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                        No
                      </label>
                    </div> 

                    <br>{!! Form::submit('Save', array('class' => 'btn btn-primary')) !!}
                {!! Form::close() !!}
           	</div>
            <div class="col-md-4"></div>
        </div>
    </div>
@endsection