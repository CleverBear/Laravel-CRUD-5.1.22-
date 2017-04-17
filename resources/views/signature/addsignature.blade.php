<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black">
  <meta name="apple-touch-fullscreen" content="yes" />
  <title>Add your Signature</title>
  <link href="{{ URL::asset("assets/global/plugins/bootstrap/css/bootstrap.min.css") }}" rel="stylesheet" type="text/css"/>
</head>
<body>
  <!-- Body Content -->
  <div class="container" style="margin-top: 10px;"> 

    @if(Session::has('massage'))
    <div class="alert alert-danger"> 
      <p>{{ Session::get('massage') }}</p>
    </div>
    @endif
    @if (count($errors) > 0)
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
    @endif

    
    <div class="row">
      <div style="display:none" class="js-signature"></div>
    </div>

    <div class="row">
      <div class="col-md-4"></div>
      <div class="col-md-4">
      @if($signature->signature == NULL)
        <div class="row">
          <div class="col-xs-12"  style="width:300px">
            <div class="js-signature" data-width="300" data-height="100"  data-line-color="#000" data-auto-fit="true"></div>
            <p><button id="clearBtn" class="btn btn-default" onclick="clearCanvas();">Clear Signature</button>&nbsp;<button id="saveBtn" class="btn btn-default" onclick="saveSignature();" disabled>Drow Signature</button></p>
            <div id="signature">
              <p><em>Your signature will appear here when you click "Save Signature"</em></p>
            </div>
          </div>
        </div>
        <form method="post" action="{{ action('Signature\SignatureController@postSignature', ['token' => $token ]) }}">
          {!! csrf_field() !!}
          <textarea id="input" name="signature" style="display:none"></textarea><br><br>
          <input id="save" type="submit" class="btn btn-default" value="Save Signature" style="display:none">
        </form>
      @else 
        <p class="text-center text-danger">You already add a signature</p>
      @endif
      </div>
      <div class="col-md-4"></div>

    </div>
    

  </div>
  <!-- Scripts -->
  <script src="{{ asset('js/jquery.min.js') }}"></script>
  <script src="{{ asset('js/jq-signature.min.js') }}"></script>
  <script>
    $(document).on('ready', function() {
      if ($('.js-signature').length) {
        $('.js-signature').jqSignature();
      }
    });

  /*
  * Demo
  */

  function clearCanvas() {
    $('#signature').html('<p><em>Your signature will appear here when you click "Save Signature"</em></p>');
    $('.js-signature').eq(1).jqSignature('clearCanvas');
    $('#saveBtn').attr('disabled', true);
    $('#save').hide();
  }

  function saveSignature() {
    $('#signature').empty();
    var dataUrl = $('.js-signature').eq(1).jqSignature('getDataURL');
    
    var value =  dataUrl;
    value = value.replace('data:image/png;base64,','');
    $('#input').val(value);

    var img = $('<img>').attr('src', dataUrl);
    $('#signature').append($('<p>').text("Here's your signature:"));
    $('#signature').append(img);
    $('#save').show();
  }

  $('.js-signature').eq(1).on('jq.signature.changed', function() {
    $('#saveBtn').attr('disabled', false);
  });
</script>
</body>
</html>