@extends ('layout.app-login')
@section('title', 'Login')
@section('content')
<!-- Outer Row -->
<div class="row justify-content-center">
	<div class="col-lg-6">
		<div class="card o-hidden border-0 shadow-lg my-5">
			<div class="card-body p-0">
				<!-- Nested Row within Card Body -->
				<div class="row">
					<div class="col-lg">
						<div class="p-5">
							<div class="text-center">
								<h1 class="h4 text-gray-900 mb-4">Login Page</h1>
							</div>
							@if(session('gagal'))
							<div class="alert alert-danger" role="alert">
								{{session('gagal')}}
							</div>
							@endif
							<form class="user" method="POST" action="{{url('login')}}">
								@csrf
								<div class="form-group">
									<input type="email" class="form-control form-control-user {{$errors->has('email') ? 'is-invalid': ''}}" id="email" name="email" placeholder="Enter Email Address..." value="{{old('email')}}">
									@if($errors->has('email'))
										 <div class="invalid-feedback">{{$errors->first('email')}}</div>
									@endif
								</div>
								<div class="form-group">
									<input type="password" class="form-control form-control-user {{$errors->has('password') ? 'is-invalid': ''}}" id="password" placeholder="Password" name="password" value="{{old('password')}}">
									@if($errors->has('password'))
										 <div class="invalid-feedback">{{$errors->first('password')}}</div>
									@endif
								</div>
								<div class="form-group">
									<div class="custom-control custom-checkbox small">
										<input type="checkbox" class="custom-control-input" id="customCheck">
										<label class="custom-control-label" for="customCheck">Remember Me</label>
									</div>
								</div>
								<button type="submit" class="btn btn-primary btn-user btn-block">Login</button>
								<hr>
								<a href="index.html" class="btn btn-google btn-user btn-block">
									<i class="fab fa-google fa-fw"></i> Login with Google
								</a>
								<a href="index.html" class="btn btn-facebook btn-user btn-block">
									<i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
								</a>
							</form>
							<hr>
							<div class="text-center">
								<a class="small" href="forgot-password.html">Forgot Password?</a>
							</div>
							<div class="text-center">
								<a class="small" href="{{route('register')}}">Create an Account!</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection