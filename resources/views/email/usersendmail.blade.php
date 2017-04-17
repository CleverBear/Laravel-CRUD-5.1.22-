<p>Hi {{ Auth::user()->firstname }},</p>
<p>
	Your new tax service successfully created.<br>
	First name : {{ $taxservice->firstname }}<br>
	Last name : {{ $taxservice->lastname }}<br>
	Social Insurance Number : {{ $taxservice->socialinsurancenumber }}<br>
	Type Of Tax Return : {{ $applicationtax->typeoftaxreturn }}<br>
	Address : {{ $taxservice->address }}<br>
	City : {{ $taxservice->city }}<br>
	Province\State : {{ $taxservice->provinceorstate }}<br>
</p>
<p>
	Thanks,<br>
	Abmeasy.com
</p>