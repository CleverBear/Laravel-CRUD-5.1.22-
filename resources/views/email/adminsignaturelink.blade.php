<p>Hi Admin</p>

<p>A new user signature form</p>
<p>User Name : {{ $user->firstname }} {{ $user->lastname }}<br>User email : {{ $user->email }} </p><br><br>

<a href="{{ action('Signature\SignatureController@viewSignature', ['token' => $token]) }}">Link Signature</a>