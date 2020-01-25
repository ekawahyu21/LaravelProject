<!DOCTYPE html>
<html lang="en">
<head>
	<meta name="viewpoint" content="width=device-width, internal-scale=1, shrink-to-fit=no">
	<title>@yield('title')</title>
	<!-- Custom fonts for this template-->
	<link rel="stylesheet" href="{{ asset('assets/fontawesome-free/css/all.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
	<link href="{{ asset('https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i') }}" rel="stylesheet">
	<!-- Custom styles for this template-->
	<link href="{{ asset('css/sb-admin-2.min.css')}}" rel="stylesheet">
	<link rel="stylesheet" href="{{ asset('css/main.css') }}">

</head>
<body class="bg-gradient-primary">
		
		<div id="content-wrapper" class="d-flex flex-column">
				<div id="content">
					<div class="container">
						@yield('content')
					</div>
				</div>
		</div>
<!-- Bootstrap core JavaScript-->
<script src="{{ asset('assets/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('assets/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{ asset('assets/jquery-easing/jquery.easing.min.js') }}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>
  <!-- Page level plugins -->
</body>
</html>