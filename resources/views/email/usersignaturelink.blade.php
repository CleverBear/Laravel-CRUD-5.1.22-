<p>Hi {{ $user->firstname }} {{ $user->lastname }}</p>

<p>Get your signature form</p><br><br>

<a href="{{ action('Signature\SignatureController@viewSignature', ['token' => $token]) }}">Link Signature</a>