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
	<link rel="stylesheet" href="{{ asset('css/sb-admin-2.min.css') }}">
	<link rel="stylesheet" href="{{asset('assets/datatables/dataTables.bootstrap4.min.css')}}">
	<link rel="stylesheet" href="{{ asset('css/main.css') }}">
	<link rel="stylesheet" href="{{asset('css/toastr.min.css')}}">
  
  <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>



</head>
<body id="page-top">
	
	<div id="wrapper">

		@include('includes.sidebar')
		<div id="content-wrapper" class="d-flex flex-column">
			<div id="content">
				@include('includes.navhead')
				@yield('content')
			</div>
		<!-- footer -->
		@include('includes.footer')
		</div>
		<!-- Scroll to Top Button-->
  		<a class="scroll-to-top rounded" href="#page-top">
    		<i class="fas fa-angle-up"></i>
  		</a>
	</div>
	
  <!-- Bootstrap core JavaScript-->
  <script src="{{ asset('assets/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('assets/bootstrap/js/bootstrap.bundle.min.js') }}"></script>`
  <!-- Core plugin JavaScript-->
  <script src="{{ asset('assets/jquery-easing/jquery.easing.min.js') }}"></script>

  <!-- alert & toastr -->
  
  <script src="{{ asset('js/alert.js') }}"></script>
  <!-- sweetalrt -->
  <script src="{{ asset('js/sweetalert.min.js')}}"></script>
  <script src="{{ asset('js/toastr.min.js') }}"></script>										

  <!-- Custom scripts for all pages-->
  <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>
  <!-- Page level plugins -->
  <!-- Page level custom scripts -->
 <!--  <script src="{{ asset('assets/chart.js/Chart.min.js') }}"></script>
  <script src="{{ asset('js/demo/chart-area-demo.js') }}"></script>
  <script src="{{ asset('js/demo/chart-pie-demo.js') }}"></script> -->
<!-- <script src="https://code.highcharts.com/highcharts.js"></script> -->


  <!-- Page level custom scripts -->
  <script src="{{ asset('js/demo/datatables-demo.js') }}"></script>
 
  <script src="{{ asset('assets/datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('assets/datatables/dataTables.bootstrap4.min.js') }}"></script>
  <!-- <script src="https://code.jquery.com/jquery-3.3.1.js"></script> -->
  <!-- <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script> -->
  <!-- <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script> -->
 <!-- <script src="{{ asset('js/timestamp.js')}}"></script> -->

 

 <!-- script toastr alert -->
 <script>
 	@if(Session::has('sukses'))
 		toastr.success("{{Session::get('sukses')}}","Sukses!")
 	@elseif(count($errors) > 0)
 		toastr.error("Data Gagal Disimpan","Gagal!")
  @elseif(Session::has('gagal'))
    toastr.warning("{{Session::get('gagal')}}","Gagal!")
 	@endif
 </script>

 @yield('footer')

</body>
</html>