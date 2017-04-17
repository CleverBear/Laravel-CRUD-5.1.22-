<p>Hi {{ $createUser->firstname }} {{ $createUser->lastname }},</p>

<P>Please click the link to add your signature</P>
<a href="{{ action('Signature\SignatureController@getSignature', ['token' => $signature->token]) }}">Signature</a><br><br>
<p>Thanks<br>Abmeasy.com</p>