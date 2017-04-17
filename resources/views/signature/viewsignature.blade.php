<!DOCTYPE html>
<html>
<head>
	<title>Signature</title>
	<link href="{{ URL::asset("assets/global/plugins/bootstrap/css/bootstrap.min.css") }}" rel="stylesheet" type="text/css"/>
	<style type="text/css">
		.img1 img,.img2 img,.img3 img,.img4 img {
			width: 595px;
			height: 842px;
		}
		.img img {
			height: 23px;
		}
		.img {
			margin-top: -299px !important;
			margin-left: 120px;
		}
		.print {
			margin-top: 150px;
			margin-left: 15px;
		}
		.btn {
			border-radius: 0 !important;
		}
	</style>
</head>
<body>

<div class="container center-block">
	<div class="row">
		<div class="col-md-12">
			<div class="signature">
				<div class="img1">
					<img src="{{ asset('images/T1013-1.png') }}">
				</div>
				<div class="img2">
					<img src="{{ asset('images/T1013-2.png') }}">
				</div>
				<div class="img3">
					<img src="{{ asset('images/T1013-3.png') }}">
				</div>
				<div class="img4">
					<img src="{{ asset('images/T1013-4.png') }}">
				</div>
				<div class="img">
					@if($viewsignature->signature)
						<img src="data:image/png;base64,{{ $viewsignature->signature }}">
					@endif
				</div>
			</div>
		</div>
		<div class="col-md-12">
			<div class="print">
				<a href="javascript:window.print()"><button class="btn btn-default">Print Signature Form</button></a>
			</div>
		</div>
	</div>
</div>
</body>
</html>